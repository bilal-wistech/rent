<?php

namespace App\Http\Controllers;

use Auth, DB, Session, Validator, Common;
use App\Http\Controllers\{
    CalendarController,
    EmailController
};
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\{
    Favourite,
    Properties,
    PropertyDetails,
    PropertyAddress,
    PropertyPhotos,
    PropertyPrice,
    PropertyType,
    PropertyDescription,
    Currency,
    Settings,
    Bookings,
    SpaceType,
    BedType,
    PropertySteps,
    Country,
    City,
    Area,
    Amenities,
    AmenityType,
    PricingType,
    PropertyFees
};

class PropertyController extends Controller
{

    public function userProperties(Request $request)
    {
        switch ($request->status) {
            case 'Listed':
            case 'Unlisted':
                $pram = [['status', '=', $request->status]];
                break;
            default:
                $pram = [];
                break;
        }
        $data['property_approval'] = Settings::getAll()->firstWhere('name', 'property_approval')->value;
        $data['status'] = $request->status;
        $data['properties'] = Properties::with('property_price', 'property_address')
            ->where('host_id', Auth::id())
            ->where($pram)
            ->orderBy('id', 'desc')
            ->paginate(Session::get('row_per_page'));
        $data['currentCurrency'] =  Common::getCurrentCurrency();
        return view('property.listings', $data);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $rules = array(
                'property_type_id'  => 'required',
                'space_type'        => 'required',
                'accommodates'      => 'required',
                // 'map_address'       => 'required',
                'country' => 'required',
                'area' => 'required',
                'city' => 'required',
            );
            if ($request->property_type_id == 1) {
                $rules['building'] = 'required';
                $rules['flat_no'] = 'required';
            }
            $fieldNames = array(
                'property_type_id'  => 'Home Type',
                'space_type'        => 'Room Type',
                'accommodates'      => 'Accommodates',
                // 'map_address'       => 'City',
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
                $property                  = new Properties;
                $property->host_id         = Auth::id();
                // $property->name            = SpaceType::getAll()->find($request->space_type)->name . ' in ' . $request->city;
                $property->name            = ($address) ? $address : SpaceType::getAll()->find($request->space_type)->name . ' in ' . $request->area;
                $property->property_type   = $request->property_type_id;
                $property->space_type      = $request->space_type;
                $property->accommodates    = $request->accommodates;
                $property->slug            = Common::pretty_url($property->name);

                $adminPropertyApproval = Settings::getAll()->firstWhere('name', 'property_approval')->value;
                $property->is_verified  = ($adminPropertyApproval == 'Yes') ? 'Pending' : 'Approved';

                $property->save();

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

                $property_price                 = new PropertyPrice;
                $property_price->property_id    = $property->id;
                $property_price->currency_code  = \Session::get('currency');
                $property_price->save();

                $property_steps                   = new PropertySteps;
                $property_steps->property_id      = $property->id;
                $property_steps->save();

                $property_description              = new PropertyDescription;
                $property_description->property_id = $property->id;
                $property_description->save();

                return redirect('listing/' . $property->id . '/basics');
            }
        }

        $data['property_type'] = PropertyType::getAll()->where('status', 'Active')->pluck('name', 'id');
        $data['space_type']    = SpaceType::getAll()->where('status', 'Active')->pluck('name', 'id');
        $data['countries'] = Country::orderBy('name', 'ASC')->pluck('name', 'short_name');
        return view('property.create', $data);
    }

    public function listing(Request $request, CalendarController $calendar)
    {

        $step            = $request->step;
        $property_id     = $request->id;
        $data['step']    = $step;
        $data['result']  = Properties::where('host_id', Auth::id())->findOrFail($property_id);
        $data['details'] = PropertyDetails::pluck('value', 'field');
        $data['missed']  = PropertySteps::where('property_id', $request->id)->first();

        if ($data['result']->steps_completed == 0 && $data['result']->is_verified == 'Pending') {
            try {

                $email_controller = new EmailController;
                $email_controller->notifyAdminForPropertyApproval($data['result']);
            } catch (\Exception $e) {
                Common::one_time_message('danger', __('Email was not sent due to :x', ['x' => __($e->getMessage())]));
                return redirect('properties');
            }
        }


        if ($step == 'basics') {
            if ($request->isMethod('post')) {
                $property                     = Properties::find($property_id);
                $property->bedrooms           = $request->bedrooms;
                $property->beds               = $request->beds;
                $property->bathrooms          = $request->bathrooms;
                $property->bed_type           = $request->bed_type;
                $property->property_type      = $request->property_type;
                $property->space_type         = $request->space_type;
                $property->accommodates       = $request->accommodates;
                $property->save();

                $property_steps         = PropertySteps::where('property_id', $property_id)->first();
                $property_steps->basics = 1;
                $property_steps->save();
                return redirect('listing/' . $property_id . '/description');
            }

            $data['bed_type']       = BedType::getAll()->pluck('name', 'id');
            $data['property_type']  = PropertyType::getAll()->where('status', 'Active')->pluck('name', 'id');
            $data['space_type']     = SpaceType::getAll()->pluck('name', 'id');

            // if (n_as_k_c()) {
            //     Session::flush();
            //     return view('vendor.installer.errors.user');
            // }
        } elseif ($step == 'description') {
            if ($request->isMethod('post')) {

                $rules = array(
                    'name'     => 'required|max:50',
                    'summary'  => 'nullable|max:1000'
                );

                $fieldNames = array(
                    'name'     => 'Name',
                    'summary'  => 'Summary',
                );

                $validator = Validator::make($request->all(), $rules);
                $validator->setAttributeNames($fieldNames);

                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                } else {
                    $property           = Properties::find($property_id);
                    $property->name     = $request->name;
                    $property->slug     = Common::pretty_url($request->name);
                    $property->save();

                    $property_description              = PropertyDescription::where('property_id', $property_id)->first();
                    $property_description->summary     = $request->summary;
                    $property_description->save();

                    $property_steps              = PropertySteps::where('property_id', $property_id)->first();
                    $property_steps->description = 1;
                    $property_steps->save();
                    return redirect('listing/' . $property_id . '/location');
                }
            }
            $data['description']       = PropertyDescription::where('property_id', $property_id)->first();
        } elseif ($step == 'details') {
            if ($request->isMethod('post')) {
                $property_description                       = PropertyDescription::where('property_id', $property_id)->first();
                $property_description->about_place          = $request->about_place;
                $property_description->place_is_great_for   = $request->place_is_great_for;
                $property_description->guest_can_access     = $request->guest_can_access;
                $property_description->interaction_guests   = $request->interaction_guests;
                $property_description->other                = $request->other;
                $property_description->about_neighborhood   = $request->about_neighborhood;
                $property_description->get_around           = $request->get_around;
                $property_description->save();

                return redirect('listing/' . $property_id . '/description');
            }
        } elseif ($step == 'location') {
            if ($request->isMethod('post')) {
                $rules = array(
                    // 'address_line_1' => 'required|max:250',
                    // 'address_line_2' => 'max:250',
                    'country' => 'required',
                    'city' => 'required',
                    'state' => 'nullable',
                    'area' => 'required',
                );

                $fieldNames = array(
                    // 'address_line_1' => 'Address Line 1',
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

                    $property_steps           = PropertySteps::where('property_id', $property_id)->first();
                    $property_steps->location = 1;
                    $property_steps->save();

                    return redirect('listing/' . $property_id . '/amenities');
                }
            }
            $data['country']       = Country::pluck('name', 'short_name');
        } elseif ($step == 'amenities') {
            if ($request->isMethod('post') && is_array($request->amenities)) {
                $rooms            = Properties::find($request->id);
                $rooms->amenities = implode(',', $request->amenities);
                $rooms->save();
                return redirect('listing/' . $property_id . '/photos');
            }
            $data['property_amenities'] = explode(',', $data['result']->amenities);
            $data['amenities']          = Amenities::where('status', 'Active')->get();
            $data['amenities_type']     = AmenityType::get();
        } elseif ($step == 'photos') {
            if ($request->isMethod('post')) {
                if ($request->crop == 'crop' && $request->photos) {
                    $baseText = explode(";base64,", $request->photos);
                    $name = explode(".", $request->img_name);
                    $convertedImage = base64_decode($baseText[1]);
                    $request->request->add(['type' => end($name)]);
                    $request->request->add(['image' => $convertedImage]);


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
                        $path = 'public/images/property/' . $property_id;
                        if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'JPG') {
                            $uploaded = move_uploaded_file($tmp_name, $path . "/" . $image);
                        }
                    }
                }

                if ($uploaded) {
                    $photos = new PropertyPhotos;
                    $photos->property_id = $property_id;
                    $photos->photo = $image;
                    $photos->serial = 1;
                    $photos->cover_photo = 1;

                    $exist = PropertyPhotos::orderBy('serial', 'desc')
                        ->select('serial')
                        ->where('property_id', $property_id)
                        ->take(1)->first();

                    if (!empty($exist->serial)) {
                        $photos->serial = $exist->serial + 1;
                        $photos->cover_photo = 0;
                    }
                    $photos->save();
                    $property_steps = PropertySteps::where('property_id', $property_id)->first();
                    $property_steps->photos = 1;
                    $property_steps->save();
                }

                return redirect('listing/' . $property_id . '/photos')->with('success', 'File Uploaded Successfully!');
            }

            $data['photos'] = PropertyPhotos::where('property_id', $property_id)
                ->orderBy('serial', 'asc')
                ->get();
        } elseif ($step == 'pricing') {
            if ($request->isMethod('post'))
            {
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
                }

                else {
                    $prices = $request->input('prices', []);
                    $pricingTypes = $request->input('pricing_type', []);
                    // Ensure both arrays are valid
                    if (!is_array($prices) || !is_array($pricingTypes)) {
                        return back()->with('error', __('Invalid data provided.'));
                    }

                    // Get all existing price records for this property
                    $existingPrices = PropertyPrice::where('property_id', $property_id)->get();

                    // Keep track of processed pricing types
                    $processedTypes = [];

                    // Iterate through the price array
                    foreach ($prices as $index => $price) {
                        $property_type_id = $pricingTypes[$index];

                        // Skip if pricing type is empty
                        if (empty($property_type_id)) {
                            continue;
                        }

                        // Add to processed types
                        $processedTypes[] = $property_type_id;

                        // Use updateOrCreate to either update an existing record or create a new one
                        PropertyPrice::updateOrCreate(
                            [
                                'property_id' => $property_id,
                                'property_type_id' => $property_type_id,
                            ],
                            [
                                'price' => $price,
                                'weekly_discount' => $request->weekly_discount ?? 0,
                                'monthly_discount' => $request->monthly_discount ?? 0,
                                'currency_code' => $request->currency_code,
                                'cleaning_fee' => $request->cleaning_fee ?? 0,
                                'guest_fee' => $request->guest_fee ?? 0,
                                'guest_after' => $request->guest_after ?? 0,
                                'security_fee' => $request->security_fee ?? 0,
                                'weekend_price' => $request->weekend_price ?? 0,
                            ]
                        );
                    }

                    // Delete any pricing types that weren't in the submitted form
                    PropertyPrice::where('property_id', $property_id)
                        ->whereNotIn('property_type_id', $processedTypes)
                        ->delete();

                    // Update the PropertySteps model after processing all prices
                    $property_steps = PropertySteps::where('property_id', $property_id)->first();
                    if ($property_steps) {
                        $property_steps->pricing = 1;
                        $property_steps->save();
                    }
                    return redirect('listing/' . $property_id . '/booking');
                }

            }
        } elseif ($step == 'booking') {
            if ($request->isMethod('post')) {


                $property_steps          = PropertySteps::where('property_id', $property_id)->first();
                $property_steps->booking = 1;
                $property_steps->save();

                $properties               = Properties::find($property_id);
                $properties->booking_type = $request->booking_type;
                $properties->status       = ($properties->steps_completed == 0) ?  'Listed' : 'Unlisted';
                $properties->save();


                return redirect('properties')->with('message','Listing Added Successfully');
            }
        } /* elseif ($step == 'calendar') {
            $data['calendar'] = $calendar->generate($request->id);
        } */
        $data['pricing_types'] = PricingType::all();
        $data['propertyPricing'] = PropertyPrice::where('property_id', $property_id)->get();

        return view("listing.$step", $data);
    }


    public function updateStatus(Request $request)
    {
        $property_id = $request->id;
        $reqstatus = $request->status;
        if ($reqstatus == 'Listed') {
            $status = 'Unlisted';
        } else {
            $status = 'Listed';
        }
        $properties         = Properties::where('host_id', Auth::id())->find($property_id);
        $properties->status = $status;
        $properties->save();
        $properties->prop_status = __($status);
        return  response()->json($properties);
    }
    public function getPrice(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $booking = Bookings::with([
            'properties.property_dates' => function ($query) use ($validated) {
                $query->whereBetween('date', [$validated['start_date'], $validated['end_date']]);
            },
            'users'
        ])
            ->where('property_id', $validated['property_id'])
            ->where(function ($query) use ($validated) {
                $query->where('start_date', '<=', $validated['end_date'])
                    ->where('end_date', '>=', $validated['start_date']);
            })
            ->first();
        $property_price = PropertyPrice::with('pricingType')->where('property_id', $validated['property_id'])->get();
        // dd($property_price);
        if ($booking) {

            $property_dates = $booking->properties->property_dates;
            return response()->json([
                'exists' => true,
                'message' => 'Booking from ' . Carbon::parse($booking->start_date)->format('d-m-Y') . ' to ' . Carbon::parse($booking->end_date)->format('d-m-Y') . ' already exists',
                'booking_id' => $booking->id,
                'booking' => $booking,
                'property_dates' => $property_dates,
                'user' => [
                    'user_id' => $booking->users->id,
                    'user_name' => $booking->users->first_name . " " . $booking->users->last_name,
                ],
                'property_price' => $property_price
            ]);
        }

        $multiplierMapping = [
            'daily' => 1,
            'weekly' => 7,
            'monthly' => 30,
            'yearly' => 365,
        ];
        $pricingType = $request->get('pricingType');
        $pricingTypeAmount = $request->get('pricingTypeAmount');
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');
        $property_id = $request->get('property_id');
        // dd($pricingType,$pricingTypeAmount,$startDate,$endDate,$property_id);
        $property = Properties::findOrFail($property_id);
        // dd($property);
        $pricingTypeDetail = PricingType::where('id', $pricingType)->first();
        // Convert start and end dates to Carbon instances
        $start = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);
        $totalPrice = 0;
        $perDayPrice = 0;
        // Calculate the difference in days
        $numberOfDays = $end->diffInDays($start);

        $rateMultiplier = $multiplierMapping[strtolower($pricingTypeDetail->name)] ?? 1;
        $perDayPrice = $pricingTypeAmount / $rateMultiplier;
        // Calculate total price
        $totalPrice = ($numberOfDays / $rateMultiplier) * $pricingTypeAmount;

        // dd($property->property_prices);
        $propertyPrice = PropertyPrice::where('property_id', $property_id)->where('property_type_id', $pricingTypeDetail->id)->first();
        $totalPriceWithOtherCharges = $totalPrice + $propertyPrice->cleaning_fee + $propertyPrice->security_fee + ($propertyPrice->guest_fee * $property->accommodates);
        $propertyFee = PropertyFees::pluck('value', 'field');
        $host_service_charge = ($propertyFee['host_service_charge'] / 100) * $totalPrice;
        $guest_service_charge = ($propertyFee['guest_service_charge'] / 100) * $totalPrice;
        $iva_tax = ($propertyFee['iva_tax'] / 100) * $totalPrice;
        $accomodation_tax = ($propertyFee['accomodation_tax'] / 100) * $totalPrice;
        $totalPriceWithChargesAndFees = $totalPriceWithOtherCharges + $host_service_charge + $guest_service_charge + $iva_tax + $accomodation_tax;
        return response()->json([
            'exists' => false,
            'property_price' => $property_price,
            'pricingType' => $pricingType,
            'numberOfDays' => $numberOfDays,
            'rateMultiplier' => $rateMultiplier,
            'totalPrice' => $totalPrice,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'totalPriceWithOtherCharges' => $totalPriceWithOtherCharges,
            'totalPriceWithChargesAndFees' => $totalPriceWithChargesAndFees,
            'host_service_charge' => $host_service_charge,
            'guest_service_charge' => $guest_service_charge,
            'iva_tax' => $iva_tax,
            'accomodation_tax' => $accomodation_tax,
            'cleaning_fee' => $propertyPrice->cleaning_fee,
            'security_fee' => $propertyPrice->security_fee,
            'guest_fee' => ($propertyPrice->guest_fee * $property->accommodates),
            'perDayPrice' => $perDayPrice,
            'basePrice' => $pricingTypeAmount
        ]);

        // return Common::getPrice($request->property_id, $request->checkin, $request->checkout, $request->guest_count);
    }

    public function single(Request $request)
    {

        $data['property_slug'] = $request->slug;

        $data['result'] = $result = Properties::where('slug', $request->slug)->first();

        $userActive = $result->Users()->where('id', $result->host_id)->first();

        if ($userActive->status == 'Inactive') {
            return view('property.host_inactive');
        } elseif ($data['result']->status == 'Unlisted') {
            return view('property.unlisted_property');
        } elseif ($data['result']->is_verified == 'Pending') {

            return view('property.pending_property');
        } else {

            if (empty($result)) {
                abort('404');
            }

            $data['property_id']      = $id = $result->id;
            $data['booking_status']   = Bookings::where('property_id', $id)->select('status')->first();

            $data['property_photos']  = PropertyPhotos::where('property_id', $id)->orderBy('serial', 'asc')
                ->get();

            $data['amenities']        = Amenities::normal($id);
            $data['safety_amenities'] = Amenities::security($id);

            $newAmenityTypes          = Amenities::newAmenitiesType();
            $data['all_new_amenities'] = [];

            foreach ($newAmenityTypes as $amenites) {
                $data['all_new_amenities'][$amenites->name] = Amenities::newAmenities($id, $amenites->id);
            }

            $data['all_new_amenities'] = array_filter($data['all_new_amenities']);

            $property_address         = $data['result']->property_address;

            $latitude                 = $property_address->latitude;

            $longitude                = $property_address->longitude;

            $data['checkin']          = (isset($request->checkin) && $request->checkin != '') ? $request->checkin : '';
            $data['checkout']         = (isset($request->checkout) && $request->checkout != '') ? $request->checkout : '';

            $data['guests']           = (isset($request->guests) && $request->guests != '') ? $request->guests : '';

            // $data['similar']  = Properties::join('property_address', function ($join) {
            //                                 $join->on('properties.id', '=', 'property_address.property_id');
            // })
            //                             ->select(DB::raw('*, ( 3959 * acos( cos( radians(' . $latitude . ') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $longitude . ') ) + sin( radians(' . $latitude . ') ) * sin( radians( latitude ) ) ) ) as distance'))
            //                             ->having('distance', '<=', 30)
            //                             ->where('properties.host_id', '!=', Auth::id())
            //                             ->where('properties.id', '!=', $id)
            //                             ->where('properties.status', 'Listed')
            //                             ->get();

            $data['title']    =   $data['result']->name . ' in ' . $data['result']->property_address->city;
            $data['symbol'] = Common::getCurrentCurrencySymbol();
            $data['shareLink'] = url('properties/' . $data['property_slug']);

            $data['date_format'] = Settings::getAll()->firstWhere('name', 'date_format_type')->value;

            $data['adminPropertyApproval'] = Settings::getAll()->firstWhere('name', 'property_approval')->value;
            $data['propertyPrices'] = PropertyPrice::where('property_id',$result->id)->get();
            return view('property.single', $data);
        }
    }

    public function currencySymbol(Request $request)
    {
        $symbol          = Currency::code_to_symbol($request->currency);
        $data['success'] = 1;
        $data['symbol']  = $symbol;

        return json_encode($data);
    }

    public function photoMessage(Request $request)
    {
        $property = Properties::find($request->id);
        if ($property->host_id == \Auth::user()->id) {
            $photos = PropertyPhotos::find($request->photo_id);
            $photos->message = $request->messages;
            $photos->save();
        }

        return json_encode(['success' => 'true']);
    }

    public function photoDelete(Request $request)
    {
        $property   = Properties::find($request->id);
        if ($property->host_id == \Auth::user()->id) {
            $photos = PropertyPhotos::find($request->photo_id);
            $photos->delete();
        }

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

        $photos         = PropertyPhotos::find($request->id);
        $photos->serial = $request->serial;
        $photos->save();

        return json_encode(['success' => 'true']);
    }


    public function set_slug()
    {

        $properties   = Properties::where('slug', NULL)->get();
        foreach ($properties as $key => $property) {

            $property->slug     = Common::pretty_url($property->name);
            $property->save();
        }
        return redirect('/');
    }

    public function userBookmark()
    {

        $data['bookings'] = Favourite::with(['properties' => function ($q) {
            $q->with('property_address');
        }])->where(['user_id' => Auth::id(), 'status' => 'Active'])->orderBy('id', 'desc')
            ->paginate(Settings::getAll()->where('name', 'row_per_page')->first()->value);
        return view('users.favourite', $data);
    }

    public function addEditBookMark()
    {
        $property_id = request('id');
        $user_id = request('user_id');

        $favourite = Favourite::where('property_id', $property_id)->where('user_id', $user_id)->first();

        if (empty($favourite)) {
            $favourite = Favourite::create([
                'property_id' => $property_id,
                'user_id' => $user_id,
                'status' => 'Active',
            ]);
        } else {
            $favourite->status = ($favourite->status == 'Active') ? 'Inactive' : 'Active';
            $favourite->save();
        }

        return response()->json([
            'favourite' => $favourite
        ]);
    }

    public function unauthenticationFavourite($id)
    {
        Session::put('favourite_property', $id);

        return redirect('login');
    }
}
