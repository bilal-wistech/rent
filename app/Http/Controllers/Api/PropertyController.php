<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
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
use App\Models\PropertyPhotos;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Resources\PropertyResource;
use App\Http\Requests\PropertySearchRequest;

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
                    'amenities' => Amenities::select('id', 'title', 'type_id')->with(['amenityType' => function ($query) {
                        $query->select('id', 'name');
                    }])
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
                ->with(['cities' => function ($query) {
                    $query->where('show_on_front', 1)
                        ->select('id', 'name', 'country_id')
                        ->with(['areas' => function ($query) {
                            $query->where('show_on_front', 1)
                                ->select('id', 'name', 'city_id');
                        }]);
                }])
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
}
