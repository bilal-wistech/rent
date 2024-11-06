<?php

/**
 * Properties Controller
 *
 * Properties Controller manages Properties by admin.
 *
 * @category   Properties
 * @package    vRent
 * @author     Techvillage Dev Team
 * @copyright  2020 Techvillage
 * @license
 * @version    2.7
 * @link       http://techvill.net
 * @email      support@techvill.net
 * @since      Version 1.3
 * @deprecated None
 */

namespace App\Http\Controllers\Admin;

use PDF, Validator, Excel, Common;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\PropertyDataTable;
use App\Exports\PropertiesExport;
use App\Http\Controllers\Admin\CalendarController;
use App\Models\{
    Properties,
    PropertyDetails,
    PropertyAddress,
    PropertyPhotos,
    PropertyPrice,
    PropertyType,
    PropertyDescription,
    SpaceType,
    BedType,
    PropertySteps,
    Country,
    Amenities,
    AmenityType,
    Area,
    User,
    Settings,
    Bookings,
    Currency,
    City,
    PricingType,
};

class PropertiesController extends Controller
{

    public function index(PropertyDataTable $dataTable)
    {
        $data['from'] = isset(request()->from) ? request()->from : null;
        $data['to'] = isset(request()->to) ? request()->to : null;
        $data['property_type_all'] = PropertyType::getAll();


        if (isset(request()->reset_btn)) {
            $data['from'] = null;
            $data['to'] = null;
            $data['allstatus'] = '';
            $data['allPropertyType'] = '';
            return $dataTable->render('admin.properties.view', $data);
        }


        isset(request()->status) ? $data['allstatus'] = $allstatus = request()->status : $data['allstatus'] = $allstatus = '';
        isset(request()->property_type) ? $data['allPropertyType'] = request()->property_type : $data['allPropertyType'] = '';
        return $dataTable->render('admin.properties.view', $data);
    }

    public function add(Request $request)
    {
        // dd($request);
        if ($request->isMethod('post')) {
            $rules = array(
                'property_type_id' => 'required',
                'space_type' => 'required',
                'accommodates' => 'required',
                // 'name' => 'required',
                'host_id' => 'required',
                'country' => 'required',
                'area' => 'required',
                'city' => 'required',
            );
            if ($request->property_type_id == 1) {
                $rules['building'] = 'required';
                $rules['flat_no'] = 'required';
            }
            $fieldNames = array(
                'property_type_id' => 'Home Type',
                'space_type' => 'Room Type',
                'accommodates' => 'Accommodates',
                // 'name' => 'Property Name',
                'host_id' => 'Host',
                'building' => 'Building',
                'flat_no' => 'Flat Number',
                'country' => 'Country',
                'area' => 'Area',
                'city' => 'City',
            );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                $country = Country::where('short_name', $request->country)->first();
                $city = City::findOrFail($request->city);
                // $area = Area::findOrFail($request->area);
                $addressParts = [$request->area];

                if (!empty($request->building)) {
                    $addressParts[] = $request->building;
                }

                if (!empty($request->flat_no)) {
                    $addressParts[] = 'Flat ' . $request->flat_no;
                }

                $address = implode(', ', $addressParts);

                $property = new Properties;
                $property->host_id = $request->host_id;
                $property->name = $address;
                $property->property_type = $request->property_type_id;
                $property->space_type = $request->space_type;
                $property->accommodates = $request->accommodates;
                $property->slug = Common::pretty_url($property->name);
                $property->is_verified = 'Approved';
                $property->save();
                // dd($property);
                $property_address = new PropertyAddress;
                $property_address->property_id = $property->id;
                $property_address->address_line_1 = $request->route;
                $property_address->city = $city->name;
                $property_address->state = $country->short_name;
                $property_address->country = $country->short_name;
                $property_address->postal_code = $request->postal_code;
                $property_address->latitude = $request->latitude;
                $property_address->longitude = $request->longitude;
                $property_address->area = $request->area;
                $property_address->building = $request->building;
                $property_address->flat_no = $request->flat_no;
                $property_address->save();
                
                $property_price = new PropertyPrice;
                $property_price->property_id = $property->id;
                $property_price->currency_code = \Session::get('currency');
                $property_price->property_type_id = 1;
                $property_price->save();

                $property_steps = new PropertySteps;
                $property_steps->property_id = $property->id;
                $property_steps->save();

                $property_description = new PropertyDescription;
                $property_description->property_id = $property->id;
                $property_description->save();

                return redirect('admin/listing/' . $property->id . '/basics');
            }
        }

        $data['property_type'] = PropertyType::where('status', 'Active')->pluck('name', 'id');
        $data['space_type'] = SpaceType::where('status', 'Active')->pluck('name', 'id');
        $data['users'] = User::where('status', 'Active')->get();
        $data['countries'] = Country::orderBy('name', 'ASC')->pluck('name', 'short_name');
        return view('admin.properties.add', $data);
    }
    public function getCitiesByCountry($country)
    {
        $country = Country::where('short_name', $country)->first();
        $cities = City::where('country_id', $country->id)->get();
        return response()->json(['cities' => $cities]);
    }
    public function getAreas($country, $city)
    {
        dd($country,$city);
        $country = Country::where('short_name', $country)->first();
        if (!$country) {
            return response()->json(['error' => 'Country not found'], 404);
        }
        $city = City::findOrFail($city);
        if (!$city) {
            return response()->json(['error' => 'City not found'], 404);
        }
        $areas = Area::where('country_id', $country->id)
            ->where('city_id', $city->id)
            ->get();
        return response()->json(['areas' => $areas]);
    }

    public function listing(Request $request, CalendarController $calendar)
    {
        $step = $request->step;
        $property_id = $request->id;

        $data['step'] = $step;
        $data['result'] = Properties::findOrFail($property_id);
        $data['details'] = PropertyDetails::pluck('value', 'field');

        if ($step == 'basics') {
            if ($request->isMethod('post')) {
                $property = Properties::find($property_id);
                $property->bedrooms = $request->bedrooms;
                $property->beds = $request->beds;
                $property->bathrooms = $request->bathrooms;
                $property->bed_type = $request->bed_type;
                $property->property_type = $request->property_type;
                $property->space_type = $request->space_type;
                $property->accommodates = $request->accommodates;
                $property->recomended = $request->recomended;
                $property->is_verified = $request->verified;
                $property->save();

                $property_steps = PropertySteps::where('property_id', $property_id)->first();
                $property_steps->basics = 1;
                $property_steps->save();
                return redirect('admin/listing/' . $property_id . '/description');
            }

            $data['bed_type'] = BedType::getAll()->pluck('name', 'id');
            $data['property_type'] = PropertyType::where('status', 'Active')->pluck('name', 'id');
            $data['space_type'] = SpaceType::pluck('name', 'id');
        } elseif ($step == 'description') {
            if ($request->isMethod('post')) {
                $rules = array(
                    'name' => 'required|max:50',
                    'summary' => 'required|max:1000',
                );

                $fieldNames = array(
                    'name' => 'Name',
                    'summary' => 'Summary',
                );

                $validator = Validator::make($request->all(), $rules);
                $validator->setAttributeNames($fieldNames);

                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                } else {
                    $property = Properties::find($property_id);
                    $property->name = $request->name;
                    $property->slug = Common::pretty_url($request->name);
                    $property->save();

                    $property_description = PropertyDescription::where('property_id', $property_id)->first();
                    $property_description->summary = $request->summary;
                    $property_description->save();

                    $property_steps = PropertySteps::where('property_id', $property_id)->first();
                    $property_steps->description = 1;
                    $property_steps->save();
                    return redirect('admin/listing/' . $property_id . '/location');
                }
            }
            $data['description'] = PropertyDescription::where('property_id', $property_id)->first();
        } elseif ($step == 'details') {
            if ($request->isMethod('post')) {
                $property_description = PropertyDescription::where('property_id', $property_id)->first();
                $property_description->about_place = $request->about_place;
                $property_description->place_is_great_for = $request->place_is_great_for;
                $property_description->guest_can_access = $request->guest_can_access;
                $property_description->interaction_guests = $request->interaction_guests;
                $property_description->other = $request->other;
                $property_description->about_neighborhood = $request->about_neighborhood;
                $property_description->get_around = $request->get_around;
                $property_description->save();

                return redirect('admin/listing/' . $property_id . '/description');
            }
        } elseif ($step == 'location') {
            if ($request->isMethod('post')) {
                $rules = array(
                    'address_line_1' => 'required|max:250',
                    'address_line_2' => 'max:250',
                    'country' => 'required',
                    'city' => 'required',
                    'state' => 'required',
                    'area' => 'required',
                );

                $fieldNames = array(
                    'address_line_1' => 'Address Line 1',
                    'country' => 'Country',
                    'city' => 'City',
                    'state' => 'State',
                    'area' => 'Area',
                );

                $messages = [
                    'not_in' => 'Please set :attribute pointer',
                ];

                $validator = Validator::make($request->all(), $rules, $messages);
                $validator->setAttributeNames($fieldNames);

                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                } else {
                    $property_address = PropertyAddress::where('property_id', $property_id)->first();
                    $property_address->address_line_1 = $request->address_line_1;
                    $property_address->address_line_2 = $request->address_line_2;
                    $property_address->latitude = $request->latitude;
                    $property_address->longitude = $request->longitude;
                    $property_address->city = $request->city;
                    $property_address->state = $request->state;
                    $property_address->country = $request->country;
                    $property_address->postal_code = $request->postal_code;
                    $property_address->area = $request->area;
                    $property_address->building = $request->building;
                    $property_address->flat_no = $request->flat_no;
                    $property_address->save();

                    $property_steps = PropertySteps::where('property_id', $property_id)->first();
                    $property_steps->location = 1;
                    $property_steps->save();

                    return redirect('admin/listing/' . $property_id . '/amenities');
                }
            }
            $data['country'] = Country::pluck('name', 'short_name');
        } elseif ($step == 'amenities') {
            if ($request->isMethod('post') && is_array($request->amenities)) {
                $rooms = Properties::find($request->id);
                $selectedAmenityIds = Amenities::select('id', 'type_id')->whereIn('id', $request->amenities)->get();
                $commonAmenityTypeId = AmenityType::orderby('id', 'asc')->value('id');

                $amenities = 0;
                foreach ($selectedAmenityIds as $id) {
                    if ($id->type_id == $commonAmenityTypeId) {
                        $amenities++;
                        break;
                    }
                }

                if ($amenities >= 1) {
                    $rooms->amenities = implode(',', $request->amenities);
                    $rooms->save();
                    return redirect('admin/listing/' . $property_id . '/photos');
                } else {
                    Common::one_time_message('error', __('Choose at least one item from the Common Amenities'));
                    return redirect('admin/listing/' . $property_id . '/amenities');
                }

            } elseif ($request->isMethod('post') && empty($request->amenities)) {
                Common::one_time_message('error', __('Choose at least one item from the Common Amenities'));
                return redirect('admin/listing/' . $property_id . '/amenities');
            } else {
                $data['property_amenities'] = explode(',', $data['result']->amenities);
                $data['amenities'] = Amenities::where('status', 'Active')->get();
                $data['amenities_type'] = AmenityType::get();
            }

        } elseif ($step == 'photos') {
            if ($request->isMethod('post')) {

                if ($request->crop == 'crop' && $request->photos) {
                    $baseText = explode(";base64,", $request->photos);
                    $name = explode(".", $request->img_name);
                    $convertedImage = base64_decode($baseText[1]);
                    $request->request->add(['type' => end($name)]);


                    $validate = Validator::make($request->all(), [
                        'type' => 'required|in:png,jpg,JPG,JPEG,jpeg,bmp',
                        'img_name' => 'required',
                        'photos' => 'required',
                    ]);
                } else {
                    $validate = Validator::make($request->all(), [
                        'file' => 'required|file|mimes:jpg,jpeg,bmp,png,gif,JPG|dimensions:min_width=640,min_height=360',
                    ]);
                }

                if ($validate->fails()) {
                    return back()->withErrors($validate)->withInput();
                }

                $path = public_path('images/property/' . $property_id . '/');

                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }

                if ($request->crop == "crop") {
                    $image = $name[0] . uniqid() . '.' . end($name);
                    $uploaded = file_put_contents($path . $image, $convertedImage);
                } else {
                    if (isset($_FILES["file"]["name"])) {
                        $tmp_name = $_FILES["file"]["tmp_name"];
                        $name = str_replace(' ', '_', $_FILES["file"]["name"]);
                        $ext = pathinfo($name, PATHINFO_EXTENSION);
                        $image = time() . '_' . $name;
                        $path = 'images/property/' . $property_id;
                        if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'JPG') {
                            $uploaded = move_uploaded_file($tmp_name, $path . "/" . $image);
                        }
                    }
                }


                if ($uploaded) {
                    $photo_exist_first = PropertyPhotos::where('property_id', $property_id)->count();
                    if ($photo_exist_first != 0) {
                        $photo_exist = PropertyPhotos::orderBy('serial', 'desc')
                            ->where('property_id', $property_id)
                            ->take(1)->first();
                    }
                    $photos = new PropertyPhotos;
                    $photos->property_id = $property_id;
                    $photos->photo = $image;
                    if ($photo_exist_first != 0) {
                        $photos->serial = $photo_exist->serial + 1;
                    } else {
                        $photos->serial = $photo_exist_first + 1;
                    }
                    if (!$photo_exist_first) {
                        $photos->cover_photo = 1;
                    }

                    $photos->save();
                    $property_steps = PropertySteps::where('property_id', $property_id)->first();
                    $property_steps->photos = 1;
                    $property_steps->save();
                }

                return redirect('admin/listing/' . $property_id . '/photos')->with('success', 'File Uploaded Successfully!');
            }

            $data['photos'] = PropertyPhotos::where('property_id', $property_id)
                ->orderBy('serial', 'asc')
                ->get();
        } elseif ($step == 'pricing') {
            if ($request->isMethod('post')) {
                // Check for existing bookings with a different currency
                $bookings = Bookings::where('property_id', $property_id)
                    ->where('currency_code', '!=', $request->currency_code)
                    ->first();

                if ($bookings) {
                    Common::one_time_message('error', __('Booking has been made using the current currency. It cannot be changed now'));
                    return redirect()->back();
                }

                $rules = [
                    'prices' => 'required|array',
                    'pricing_type' => 'required|array', // Ensure pricing_type is also required
                ];

                $fieldNames = [
                    'prices' => 'Price',
                    'pricing_type' => 'Pricing Type',
                ];

                // Validate the request
                $validator = Validator::make($request->all(), $rules);
                $validator->setAttributeNames($fieldNames);

                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                } else {
                    // Initialize arrays to avoid null errors
                    $prices = $request->input('prices', []);
                    $pricingTypes = $request->input('pricing_type', []);

                    // Ensure both arrays are valid
                    if (!is_array($prices) || !is_array($pricingTypes)) {
                        return back()->with('error', __('Invalid data provided.'));
                    }

                    // Iterate through the price array
                    foreach ($prices as $index => $price) {
                        $property_type_id = $pricingTypes[$index]; // Get the corresponding property type ID

                        // Use updateOrCreate to either update an existing record or create a new one
                        PropertyPrice::updateOrCreate(
                            [
                                'property_id' => $property_id,
                                'property_type_id' => $property_type_id,
                            ],
                            [
                                'price' => $price,
                                'weekly_discount' => $request->weekly_discount ?? 0, // Default to 0 if null
                                'monthly_discount' => $request->monthly_discount ?? 0, // Default to 0 if null
                                'currency_code' => $request->currency_code,
                                'cleaning_fee' => $request->cleaning_fee ?? 0, // Default to 0 if null
                                'guest_fee' => $request->guest_fee ?? 0, // Default to 0 if null
                                'guest_after' => $request->guest_after ?? 0, // Default to 0 if null
                                'security_fee' => $request->security_fee ?? 0, // Default to 0 if null
                                'weekend_price' => $request->weekend_price ?? 0, // Default to 0 if null
                            ]
                        );
                    }

                    // Update the PropertySteps model after processing all prices
                    $property_steps = PropertySteps::where('property_id', $property_id)->first();
                    if ($property_steps) {
                        $property_steps->pricing = 1;
                        $property_steps->save();
                    }

                    // Redirect to the booking page
                    return redirect('admin/listing/' . $property_id . '/booking')->with('success', __('Pricing updated successfully.'));
                }
            }


        } elseif ($step == 'booking') {
            if ($request->isMethod('post')) {

                $property_steps = PropertySteps::where('property_id', $property_id)->first();
                $property_steps->booking = 1;
                $property_steps->save();

                $properties = Properties::find($property_id);
                $properties->booking_type = $request->booking_type;
                $properties->status = ($properties->steps_completed == 0) ? 'Listed' : 'Unlisted';
                $properties->save();

                return redirect('admin/properties')->with('success', 'Property has been listed');
            }
        }

        $pricing_types = PricingType::all();
        $propertyPricing = PropertyPrice::where('property_id', $property_id)->get();
        return view("admin.listing.$step", array_merge($data, compact('pricing_types', 'propertyPricing')));

    }

    public function update(Request $request)
    {
        if (!$request->isMethod('post')) {
            $amenity_type = AmenityType::get();
            $am = [];
            foreach ($amenity_type as $key => $value) {
                $am[$value->id] = $value->name;
            }
            $data['am'] = $am;
            $data['result'] = Amenities::find($request->id);
            return view('admin.amenities.edit', $data);
        } elseif ($request->isMethod('post')) {
            $rules = array(
                'title' => 'required',
                'description' => 'required',
                'symbol' => 'required',
                'type_id' => 'required',
                'status' => 'required'

            );

            $fieldNames = array(
                'title' => 'Title',
                'description' => 'Description',
                'symbol' => 'Symbol'
            );

            $validator = Validator::make($request->all(), $rules);
            $validator->setAttributeNames($fieldNames);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                $amenitie = Amenities::find($request->id);
                $amenitie->title = $request->title;
                $amenitie->description = $request->description;
                $amenitie->symbol = $request->symbol;
                $amenitie->type_id = $request->type_id;
                $amenitie->status = $request->status;
                $amenitie->save();

                Common::one_time_message('success', 'Updated Successfully');
                return redirect('admin/amenities');
            }
        }
    }

    public function currencySymbol(Request $request)
    {
        $symbol = Currency::code_to_symbol($request->currency);
        $data['success'] = 1;
        $data['symbol'] = $symbol;

        return json_encode($data);
    }

    public function delete(Request $request)
    {
        $bookings = Bookings::where(['property_id' => $request->id])->get()->toArray();
        if (env('APP_MODE', '') != 'test') {
            if (count($bookings) > 0) {
                Common::one_time_message('danger', 'This Property has Bookings. Sorry can not possible to delete');
            } else {
                Properties::find($request->id)->delete();
                Common::one_time_message('success', 'Deleted Successfully');
                return redirect('admin/properties');
            }
        }
        return redirect('admin/properties');
    }

    public function photoMessage(Request $request)
    {
        $property = Properties::find($request->id);
        $photos = PropertyPhotos::find($request->photo_id);
        $photos->message = $request->messages;
        $photos->save();

        return json_encode(['success' => 'true']);
    }

    public function photoDelete(Request $request)
    {

        $property = Properties::find($request->id);
        $photos = PropertyPhotos::find($request->photo_id);
        $photos->delete();

        return json_encode(['success' => 'true']);
    }

    public function makeDefaultPhoto(Request $request)
    {

        if ($request->option_value == 'Yes') {
            PropertyPhotos::where('property_id', '=', $request->property_id)
                ->update(['cover_photo' => 0]);

            $photos = PropertyPhotos::find($request->photo_id);
            $photos->cover_photo = 1;
            $photos->save();
        }
        return json_encode(['success' => 'true']);
    }

    public function makePhotoSerial(Request $request)
    {

        $photos = PropertyPhotos::find($request->id);
        $photos->serial = $request->serial;
        $photos->save();

        return json_encode(['success' => 'true']);
    }

    public function propertyCsv($id = null)
    {
        return Excel::download(new PropertiesExport, 'properties_sheet' . time() . '.xls');
    }

    public function propertyPdf($id = null)
    {
        $to = setDateForDb(request()->to);
        $from = setDateForDb(request()->from);

        $data['status'] = $status = isset(request()->status) ? request()->status : null;
        $data['space_type'] = $space_type = isset(request()->space_type) ? request()->space_type : null;

        $properties = $this->getAllProperties();

        if (isset($id)) {
            $properties->where('properties.host_id', '=', $id);
        }

        if ($from) {
            $properties->whereDate('properties.created_at', '>=', $from);
        }

        if ($to) {
            $properties->whereDate('properties.created_at', '<=', $to);
        }

        if (!is_null($status)) {
            $properties->where('properties.status', '=', $status);
        }

        if ($space_type) {
            $properties->where('properties.space_type', '=', $space_type);
        }

        $data['propertyList'] = $properties->get();

        if ($from && $to) {
            $data['date_range'] = onlyFormat($from) . ' To ' . onlyFormat($to);
        }

        $pdf = PDF::loadView('admin.properties.list_pdf', $data, [], [
            'format' => 'A3',
            [750, 1060]
        ]);
        return $pdf->download('property_list_' . time() . '.pdf', array("Attachment" => 0));
    }

    public function getAllProperties()
    {
        $query = Properties::join('users', function ($join) {
            $join->on('users.id', '=', 'properties.host_id');
        })
            ->join('space_type', function ($join) {
                $join->on('space_type.id', '=', 'properties.space_type');
            })

            ->select(['properties.id as properties_id', 'properties.name as property_name', 'properties.status as property_status', 'properties.created_at as property_created_at', 'properties.updated_at as property_updated_at', 'space_type.name as Space_type_name', 'properties.*', 'users.*', 'space_type.*'])
            ->orderBy('properties.id', 'desc');
        return $query;
    }
}
