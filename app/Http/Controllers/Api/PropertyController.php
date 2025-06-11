<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\City;
use App\Models\BedType;
use App\Models\Country;
use App\Models\Bookings;
use App\Models\Currency;
use App\Models\Settings;
use App\Models\Amenities;
use App\Models\SpaceType;
use App\Models\Properties;
use App\Models\AmenityType;
use App\Models\PricingType;
use App\Http\Helpers\Common;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Models\PropertyPrice;
use App\Models\PropertySteps;
use App\Models\PropertyPhotos;
use App\Models\PropertyAddress;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Models\PropertyDescription;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Resources\PropertyResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\PropertySearchRequest;
use App\Http\Requests\Api\PropertyListingRequest;

class PropertyController extends Controller
{
    private $helper;

    public function __construct(Common $helper)
    {
        $this->helper = $helper;
    }

    /**
     * Search properties based on various filters
     *
     * @param PropertySearchRequest $request
     * @return JsonResponse
     */
    public function searchProperties(PropertySearchRequest $request): JsonResponse
    {
        try {
            // Prepare filter data
            $filters = $this->prepareFilterData($request);

            // Build the query
            $query = $this->buildPropertyQuery($filters);

            // Execute query with pagination
            $properties = $query->orderBy('id', 'desc')->paginate(2);

            return response()->json([
                'success' => true,
                'message' => 'Properties retrieved successfully',
                'data' => [
                    'properties' => PropertyResource::collection($properties),
                    'filters' => $filters,
                    'pagination' => [
                        'current_page' => $properties->currentPage(),
                        'total_pages' => $properties->lastPage(),
                        'total_items' => $properties->total(),
                        'per_page' => $properties->perPage()
                    ]
                ]
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error searching properties', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while searching properties',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Prepare filter data from request
     *
     * @param PropertySearchRequest $request
     * @return array
     */
    private function prepareFilterData(PropertySearchRequest $request): array
    {
        $filters = [
            'location' => $request->input('location'),
            'checkin' => $request->input('checkin'),
            'checkout' => $request->input('checkout'),
            'guests' => $request->input('guests'),
            'bedrooms' => $request->input('min_bedrooms'),
            'beds' => $request->input('min_beds'),
            'bathrooms' => $request->input('min_bathrooms'),
            'min_price' => $request->input('min_price'),
            'max_price' => $request->input('max_price'),
            'space_type' => SpaceType::where('status', 'Active')->pluck('name', 'id'),
            'property_type' => PropertyType::where('status', 'Active')->pluck('name', 'id'),
            'amenities' => Amenities::with('amenityType')
                ->where('status', 'Active')
                ->select('id', 'title', 'type_id')
                ->get(),
        ];

        // Handle selected filters
        $filters['property_type_selected'] = $this->parseFilterInput($request->input('property_type', ''));
        $filters['space_type_selected'] = $this->parseFilterInput($request->input('space_type', ''));
        $filters['amenities_selected'] = $this->parseFilterInput($request->input('amenities', ''));

        // Currency handling
        $currency = Currency::getAll();
        $filters['currency_symbol'] = Session::get('currency')
            ? $currency->firstWhere('code', Session::get('currency'))->symbol
            : $currency->firstWhere('default', 1)->symbol;

        // Price range defaults
        $filters['default_min_price'] = $this->helper->convert_currency(
            Currency::getAll()->firstWhere('default')->code,
            '',
            Settings::where('name', 'min_search_price')->first()->value
        );
        $filters['default_max_price'] = $this->helper->convert_currency(
            Currency::getAll()->firstWhere('default')->code,
            '',
            Settings::where('name', 'max_search_price')->first()->value
        );

        // Set default prices if not provided
        if (!$filters['min_price']) {
            $filters['min_price'] = $filters['default_min_price'];
            $filters['max_price'] = $filters['default_max_price'];
        }

        $filters['date_format'] = Settings::where('name', 'date_format_type')->first()->value;

        return $filters;
    }

    /**
     * Parse filter input (string or array)
     *
     * @param mixed $input
     * @return array
     */
    private function parseFilterInput($input): array
    {
        return is_array($input) ? $input : array_filter(explode(',', $input));
    }

    /**
     * Build property query with filters
     *
     * @param array $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function buildPropertyQuery(array $filters)
    {
        $checkinDate = $filters['checkin'] ? Carbon::parse($filters['checkin']) : Carbon::today();
        $checkoutDate = $filters['checkout'] ? Carbon::parse($filters['checkout']) : Carbon::today();

        $query = Properties::where('status', 'listed')
            ->where(function ($mainQuery) use ($filters) {
                $mainQuery->where('name', 'like', "%{$filters['location']}%")
                    ->orWhereHas('property_address', function ($addressQuery) use ($filters) {
                        $addressQuery->where('address_line_1', 'like', "%{$filters['location']}%")
                            ->orWhere('address_line_2', 'like', "%{$filters['location']}%")
                            ->orWhere('city', 'like', "%{$filters['location']}%")
                            ->orWhere('state', 'like', "%{$filters['location']}%")
                            ->orWhere('country', 'like', "%{$filters['location']}%")
                            ->orWhere('area', 'like', "%{$filters['location']}%")
                            ->orWhere('building', 'like', "%{$filters['location']}%")
                            ->orWhere('flat_no', 'like', "%{$filters['location']}%");
                    });
            })
            ->with(['users', 'property_price.pricingType', 'property_address', 'bookings', 'bed_types'])
            ->whereDoesntHave('bookings', function ($bookingQuery) use ($checkinDate, $checkoutDate) {
                $bookingQuery->where(function ($conflictQuery) use ($checkinDate, $checkoutDate) {
                    $conflictQuery->whereBetween('start_date', [$checkinDate, $checkoutDate])
                        ->orWhereBetween('end_date', [$checkinDate, $checkoutDate])
                        ->orWhere(function ($overlapQuery) use ($checkinDate, $checkoutDate) {
                            $overlapQuery->where('start_date', '<=', $checkinDate)
                                ->where('end_date', '>=', $checkoutDate);
                        });
                });
            });

        // Apply filters
        if (!empty($filters['space_type_selected']) && $filters['space_type_selected'][0] !== '') {
            $query->whereIn('space_type', $filters['space_type_selected']);
        }

        if ($filters['guests']) {
            $query->where('accommodates', '>=', $filters['guests']);
        }

        if ($filters['bedrooms']) {
            $query->where('bedrooms', '>=', $filters['bedrooms']);
        }

        if ($filters['beds']) {
            $query->where('beds', '>=', $filters['beds']);
        }

        if ($filters['bathrooms']) {
            $query->where('bathrooms', '>=', $filters['bathrooms']);
        }

        if (!empty($filters['property_type_selected']) && $filters['property_type_selected'][0] !== '') {
            $query->whereIn('property_type', $filters['property_type_selected']);
        }

        if (!empty($filters['amenities_selected']) && $filters['amenities_selected'][0] !== '') {
            $query->where(function ($q) use ($filters) {
                foreach ($filters['amenities_selected'] as $amenity) {
                    $q->where('amenities', 'like', "%{$amenity}%");
                }
            });
        }

        if ($filters['min_price'] !== null || $filters['max_price'] !== null) {
            $query->whereHas('property_price', function ($q) use ($filters) {
                if ($filters['min_price'] !== null) {
                    $q->where('price', '>=', $filters['min_price']);
                }
                if ($filters['max_price'] !== null) {
                    $q->where('price', '<=', $filters['max_price']);
                }
            });
        }

        return $query;
    }
    /**
     * Get a single property by slug
     *
     * @param Request $request
     * @param string $slug
     * @return JsonResponse
     */
    public function show(Request $request, string $slug): JsonResponse
    {
        try {
            // Find property by slug
            $property = Properties::where('slug', $slug)
                ->with(['property_address', 'bed_types'])
                ->first();
            $userActive = $property->Users()->where('id', $property->host_id)->first();
            // Check if property exists
            if (!$property) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Property not found'
                ], 404);
            }

            // Check host status
            if ($userActive->status === 'Inactive') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Host is inactive'
                ], 403);
            }

            // Check property status
            if ($property->status === 'Unlisted') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Property is unlisted'
                ], 403);
            }

            // Check verification status
            if ($property->is_verified === 'Pending') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Property verification pending'
                ], 403);
            }

            // Prepare response data
            $responseData = [
                'property' => [
                    'id' => $property->id,
                    'slug' => $property->slug,
                    'name' => $property->name,
                    'address' => [
                        'city' => $property->property_address->city,
                        'state' => $property->property_address->state,
                        'country' => $property->property_address->country,
                        'area' => $property->property_address->area,
                        'building' => $property->property_address->building,
                        'flat_no' => $property->property_address->flat_no,
                    ],
                    'booking_status' => Bookings::where('property_id', $property->id)
                        ->select('status')
                        ->first()?->status,
                    'photos' => PropertyPhotos::where('property_id', $property->id)
                        ->orderBy('serial', 'asc')
                        ->get()
                        ->map(function ($photo) {
                            return [
                                'id' => $photo->id,
                                'property_id' => $photo->property_id,
                                'photo' => $photo && $photo->photo ? asset('images/property/' . $photo->property_id . '/' . $photo->photo) : null,
                                'message' => $photo->message,
                                'cover_photo' => $photo->cover_photo,
                                'serial' => $photo->serial
                            ];
                        }),
                    'amenities' => Amenities::select('id', 'title', 'type_id')->with([
                        'amenityType' => function ($query) {
                            $query->select('id', 'name');
                        }
                    ])
                        ->whereIn('id', explode(',', $property->amenities))
                        ->get(),
                    'prices' => PropertyPrice::with('pricingType')->where('property_id', $property->id)
                        ->get()
                        ->map(function ($price) {
                            return [
                                'data' => $price,
                            ];
                        }),

                    'accommodates' => $property->accommodates,
                    'bedrooms' => $property->bedrooms,
                    'beds' => $property->beds,
                    'bathrooms' => $property->bathrooms,
                    'space_type_name' => $property->space_type_name,
                    'property_type_name' => $property->property_type_name,
                    'overall_rating' => $property->overall_rating,
                    'bedType' => $property->relationLoaded('bed_types') ? $property->bed_types : null,
                    'pricingTypes' => PricingType::where('status', 1)->get(),
                ]
            ];

            // Add new amenity types
            $newAmenityTypes = Amenities::newAmenitiesType();
            foreach ($newAmenityTypes as $amenityType) {
                $amenities = Amenities::newAmenities($property->id, $amenityType->id);
                if (!empty($amenities)) {
                    $responseData['property']['amenities']['categories'][$amenityType->name] = $amenities;
                }
            }

            // Add query parameters if provided
            if ($request->has('checkin')) {
                $responseData['property']['checkin'] = $request->checkin;
            }
            if ($request->has('checkout')) {
                $responseData['property']['checkout'] = $request->checkout;
            }
            if ($request->has('guests')) {
                $responseData['property']['guests'] = $request->guests;
            }

            return response()->json([
                'status' => 'success',
                'data' => $responseData
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while fetching property details',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function getLocations()
    {
        try {
            $countries = Country::where('short_name', 'AE')
                ->where('name', 'United Arab Emirates')
                ->with([
                    'cities' => function ($query) {
                        $query->where('show_on_front', 1)
                            ->select('id', 'name', 'country_id')
                            ->with([
                                'areas' => function ($query) {
                                    $query->where('show_on_front', 1)
                                        ->select('id', 'name', 'city_id');
                                }
                            ]);
                    }
                ])
                ->select('id', 'name', 'short_name')
                ->get()
                ->map(function ($country) {
                    return [
                        'country' => $country->name,
                        'short_name' => $country->short_name,
                        'cities' => $country->cities->map(function ($city) {
                            return [
                                'name' => $city->name,
                                'id' => $city->id,
                                'areas' => $city->areas->pluck('name')->toArray()
                            ];
                        })->toArray()
                    ];
                });

            return response()->json([
                'success' => true,
                'data' => $countries
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching locations',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    /**
     * Check if the current user is authenticated and token is valid
     */
    private function checkAuthenticatedUser()
    {
        $user = auth('sanctum')->user();

        if (!$user) {
            return [
                'authenticated' => false,
                'user' => null,
                'response' => response()->json([
                    'success' => false,
                    'message' => 'Authentication required. Please login again.',
                    'error_code' => 'AUTH_REQUIRED'
                ], 401)
            ];
        }

        // Check if token exists and is not expired
        $token = auth('sanctum')->user()->currentAccessToken();

        if (!$token) {
            return [
                'authenticated' => false,
                'user' => null,
                'response' => response()->json([
                    'success' => false,
                    'message' => 'Invalid or missing authentication token. Please login again.',
                    'error_code' => 'INVALID_TOKEN'
                ], 401)
            ];
        }

        // Check if token is expired (assuming you have expires_at column)
        if ($token->expires_at && Carbon::now()->gt($token->expires_at)) {
            // Delete expired token
            $token->delete();

            return [
                'authenticated' => false,
                'user' => null,
                'response' => response()->json([
                    'success' => false,
                    'message' => 'Authentication token has expired. Please login again.',
                    'error_code' => 'TOKEN_EXPIRED'
                ], 401)
            ];
        }

        return [
            'authenticated' => true,
            'user' => $user,
            'response' => null
        ];
    }

    public function listProperty(PropertyListingRequest $request): JsonResponse
    {
        $authCheck = $this->checkAuthenticatedUser();
        if (!$authCheck['authenticated']) {
            return $authCheck['response'];
        }

        $authenticatedUserId = $authCheck['user']->id;
        try {
            DB::beginTransaction();

            $country = Country::where('short_name', $request->country)->first();
            $city = City::findOrFail($request->city);

            $property = new Properties;
            $property->host_id = $authenticatedUserId;
            $property->name = $request->area;
            $property->property_type = $request->property_type_id;
            $property->space_type = $request->space_type;
            $property->accommodates = $request->accommodates;
            $property->slug = Common::pretty_url($property->name);

            $adminPropertyApproval = Settings::getAll()->firstWhere('name', 'property_approval')->value;
            $property->is_verified = ($adminPropertyApproval == 'Yes') ? 'Pending' : 'Approved';
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

            $property_price = new PropertyPrice;
            $property_price->property_id = $property->id;
            $property_price->save();

            $property_steps = new PropertySteps;
            $property_steps->property_id = $property->id;
            $property_steps->save();

            $property_description = new PropertyDescription;
            $property_description->property_id = $property->id;
            $property_description->save();
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Property Creation Started Successfully',
                'property_id' => $property->id,
                'next_step' => 'basics'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Property creation failed: ' . $e->getMessage()
            ], 500);
        }
    }
    public function propertyBasics(Request $request): JsonResponse
    {
        try {
            $step = $request->step;
            $property_id = $request->id;

            if ($step == 'basics') {
                if ($request->isMethod('post')) {
                    DB::beginTransaction(); // Start transaction

                    $property = Properties::find($property_id);
                    $property->bedrooms = $request->bedrooms;
                    $property->beds = $request->beds;
                    $property->bathrooms = $request->bathrooms;
                    $property->bed_type = $request->bed_type;
                    $property->property_type = $request->property_type;
                    $property->space_type = $request->space_type;
                    $property->accommodates = $request->accommodates;
                    $property->name = $request->bedrooms . ' ' . BedType::getAll()->find($request->bed_type)->name . ' Bedroom ' . PropertyType::getAll()->find($request->property_type)->name . ' , ' . $property->name;
                    $property->slug = Common::pretty_url($property->name);
                    $property->save();

                    $property_steps = PropertySteps::where('property_id', $property_id)->first();
                    $property_steps->basics = 1;
                    $property_steps->save();

                    DB::commit(); // Commit transaction

                    return response()->json([
                        'success' => true,
                        'message' => 'Basic Step Completed Successfully',
                        'property_id' => $property_id,
                        'next_step' => 'description'
                    ]);
                }
            }
        } catch (\Exception $e) {
            \DB::rollBack(); // Roll back transaction if started
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }
    public function propertyDescription(Request $request): JsonResponse
    {
        try {
            $step = $request->step;
            $property_id = $request->id;
            if ($step == 'description') {
                if ($request->isMethod('post')) {
                    DB::beginTransaction(); // Start transaction

                    $property_description = PropertyDescription::where('property_id', $property_id)->first();
                    $property_description->summary = $request->summary;
                    $property_description->about_place = $request->about_place;
                    $property_description->place_is_great_for = $request->place_is_great_for;
                    $property_description->guest_can_access = $request->guest_can_access;
                    $property_description->interaction_guests = $request->interaction_guests;
                    $property_description->other = $request->other;
                    $property_description->about_neighborhood = $request->about_neighborhood;
                    $property_description->get_around = $request->get_around;
                    $property_description->save();

                    $property_steps = PropertySteps::where('property_id', $property_id)->first();
                    $property_steps->description = 1;
                    $property_steps->save();

                    DB::commit(); // Commit transaction

                    return response()->json([
                        'success' => true,
                        'message' => 'Description Added Successfully',
                        'property_id' => $property_id,
                        'next_step' => 'location'
                    ]);
                }
            }
        } catch (\Exception $e) {
            \DB::rollBack(); // Roll back transaction if started
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }
    public function propertyLocation(Request $request): JsonResponse
    {
        try {
            $step = $request->step;
            $property_id = $request->id;
            if ($step == 'description') {
                if ($request->isMethod('post')) {
                    DB::beginTransaction(); // Start transaction

                    $property_address = PropertyAddress::where('property_id', $property_id)->first();
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

                    DB::commit(); // Commit transaction

                    return response()->json([
                        'success' => true,
                        'message' => 'Location Added Successfully',
                        'property_id' => $property_id,
                        'next_step' => 'amenities'
                    ]);
                }
            }
        } catch (\Exception $e) {
            \DB::rollBack(); // Roll back transaction if started
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }
    public function propertyAmenities(Request $request): JsonResponse
    {
        try {
            $step = $request->step;
            $property_id = $request->id;
            if ($step == 'amenities') {
                if ($request->isMethod('post')) {
                    DB::beginTransaction(); // Start transaction

                    $rooms = Properties::find($request->id);
                    $rooms->amenities = implode(',', $request->amenities);
                    $rooms->save();

                    DB::commit(); // Commit transaction

                    return response()->json([
                        'success' => true,
                        'message' => 'Amenities Added Successfully',
                        'property_id' => $property_id,
                        'next_step' => 'photos'
                    ]);
                }
            }
        } catch (\Exception $e) {
            \DB::rollBack(); // Roll back transaction if started
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }
    public function propertyPhotos(Request $request): JsonResponse
    {
        try {
            $step = $request->input('step');
            $property_id = $request->input('id');

            if ($step !== 'photos') {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid step parameter'
                ], 400);
            }

            if (!$request->isMethod('post')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Method not allowed'
                ], 405);
            }

            DB::beginTransaction();

            $uploaded = false;
            $image = null;

            if ($request->input('crop') === 'crop' && $request->input('photos')) {
                $baseText = explode(";base64,", $request->input('photos'));
                if (count($baseText) < 2) {
                    throw new \Exception('Invalid base64 image data');
                }

                $name = explode(".", $request->input('img_name'));
                $convertedImage = base64_decode($baseText[1]);
                $request->merge([
                    'type' => end($name),
                    'image' => $convertedImage
                ]);

                $validator = Validator::make($request->all(), [
                    'type' => 'required|in:png,jpg,JPG,JPEG,jpeg,bmp',
                    'img_name' => 'required',
                    'photos' => 'required',
                ]);
            } else {
                $validator = Validator::make($request->all(), [
                    'file' => 'required|file|mimes:jpg,jpeg,bmp,png,gif,JPG|dimensions:min_width=640,min_height=360',
                ]);
            }

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $path = public_path('images/property/' . $property_id . '/');

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            if ($request->input('crop') === 'crop') {
                $name = explode(".", $request->input('img_name'));
                $image = $name[0] . uniqid() . '.' . end($name);
                $uploaded = file_put_contents($path . $image, $convertedImage);
            } else {
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $name = str_replace(' ', '_', $file->getClientOriginalName());
                    $ext = $file->getClientOriginalExtension();
                    $image = time() . '_' . $name;

                    if (in_array(strtolower($ext), ['png', 'jpg', 'jpeg', 'gif'])) {
                        $uploaded = $file->move($path, $image);
                    }
                }
            }

            if (!$uploaded) {
                throw new \Exception('Failed to upload image');
            }

            $photos = new PropertyPhotos();
            $photos->property_id = $property_id;
            $photos->photo = $image;
            $photos->serial = 1;
            $photos->cover_photo = 1;

            $exist = PropertyPhotos::orderBy('serial', 'desc')
                ->select('serial')
                ->where('property_id', $property_id)
                ->first();

            if ($exist && $exist->serial) {
                $photos->serial = $exist->serial + 1;
                $photos->cover_photo = 0;
            }

            $photos->save();

            $property_steps = PropertySteps::where('property_id', $property_id)->first();
            if ($property_steps) {
                $property_steps->photos = 1;
                $property_steps->save();
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Photos uploaded successfully',
                'property_id' => $property_id,
                'next_step' => 'pricing',
                'image_path' => 'images/property/' . $property_id . '/' . $image
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }
    public function propertyPricings(Request $request): JsonResponse
    {
        try {
            $step = $request->input('step');
            $property_id = $request->input('id');

            if ($step !== 'pricing') {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid step parameter'
                ], 400);
            }

            DB::beginTransaction();

            $prices = $request->input('prices', []);
            $pricingTypes = $request->input('pricing_type', []);
            $processedTypes = [];

            foreach ($prices as $index => $price) {
                if (!isset($pricingTypes[$index]) || empty($pricingTypes[$index])) {
                    continue;
                }

                $property_type_id = $pricingTypes[$index];
                $processedTypes[] = $property_type_id;

                PropertyPrice::updateOrCreate(
                    [
                        'property_id' => $property_id,
                        'property_type_id' => $property_type_id,
                    ],
                    [
                        'price' => $price,
                        'weekly_discount' => $request->input('weekly_discount', 0),
                        'monthly_discount' => $request->input('monthly_discount', 0),
                        'currency_code' => $request->input('currency_code'),
                        'cleaning_fee' => $request->input('cleaning_fee', 0),
                        'guest_fee' => $request->input('guest_fee', 0),
                        'guest_after' => $request->input('guest_after', 0),
                        'security_fee' => $request->input('security_fee', 0),
                        'weekend_price' => $request->input('weekend_price', 0),
                    ]
                );
            }

            // Delete any pricing types that weren't included in the current request
            PropertyPrice::where('property_id', $property_id)
                ->whereNotIn('property_type_id', $processedTypes)
                ->delete();

            // Update property steps
            $property_steps = PropertySteps::where('property_id', $property_id)->first();
            if ($property_steps) {
                $property_steps->pricing = 1;
                $property_steps->save();
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Pricing updated successfully',
                'property_id' => $property_id,
                'next_step' => 'booking'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }
    public function propertyBookings(Request $request): JsonResponse
    {
        try {
            $step = $request->step;
            $property_id = $request->id;
            if ($step == 'booking') {
                if ($request->isMethod('post')) {
                    DB::beginTransaction(); // Start transaction

                    $property_steps = PropertySteps::where('property_id', $property_id)->first();
                    $property_steps->booking = 1;
                    $property_steps->save();

                    $properties = Properties::find($property_id);
                    $properties->booking_type = $request->booking_type;
                    $properties->status = ($properties->steps_completed == 0) ? 'Listed' : 'Unlisted';
                    $properties->save();

                    DB::commit(); // Commit transaction

                    return response()->json([
                        'success' => true,
                        'message' => 'Booking Type Added Successfully',
                        'property_id' => $property_id,
                    ]);
                }
            }
        } catch (\Exception $e) {
            \DB::rollBack(); // Roll back transaction if started
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }
}
