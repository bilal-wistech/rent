<?php

namespace App\Http\Controllers;

use Session, Common;
use Illuminate\Http\Request;
use App\Models\{
    Properties,
    Settings,
    SpaceType,
    PropertyType,
    Amenities,
    AmenityType,
    Currency,
    PropertyDates,
};
use Carbon\Carbon;

class SearchController extends Controller
{
    private $helper;

    public function __construct()
    {
        $this->helper = new Common;
    }

    public function index(Request $request)
    {
        $location = $request->input('location');
        $data['location'] = $request->input('location');
        $data['checkin'] = $request->input('checkin');
        $data['checkout'] = $request->input('checkout');
        $data['guest'] = $request->input('guests');
        $data['bedrooms'] = $request->input('min_bedrooms');
        $data['beds'] = $request->input('min_beds');
        $data['bathrooms'] = $request->input('min_bathrooms');
        $data['min_price'] = $request->input('min_price');
        $data['max_price'] = $request->input('max_price');

        $data['space_type'] = SpaceType::getAll()->where('status', 'Active')->pluck('name', 'id');
        $data['property_type'] = PropertyType::getAll()->where('status', 'Active')->pluck('name', 'id');
        $data['amenities'] = Amenities::where('status', 'Active')->get();
        $data['amenities_type'] = AmenityType::pluck('name', 'id');

        // Handle array or string inputs for selected filters
        $property_type_input = $request->input('property_type', '');
        $data['property_type_selected'] = is_array($property_type_input) ? $property_type_input : explode(',', $property_type_input);

        $space_type_input = $request->input('space_type', '');
        $data['space_type_selected'] = is_array($space_type_input) ? $space_type_input : explode(',', $space_type_input);

        $amenities_input = $request->input('amenities', '');
        $data['amenities_selected'] = is_array($amenities_input) ? $amenities_input : explode(',', $amenities_input);

        $currency = Currency::getAll();
        $data['currency_symbol'] = Session::get('currency')
            ? $currency->firstWhere('code', Session::get('currency'))->symbol
            : $currency->firstWhere('default', 1)->symbol;

        $minPrice = Settings::getAll()->where('name', 'min_search_price')->first()->value;
        $maxPrice = Settings::getAll()->where('name', 'max_search_price')->first()->value;
        $data['default_min_price'] = $this->helper->convert_currency(Currency::getAll()->firstWhere('default')->code, '', $minPrice);
        $data['default_max_price'] = $this->helper->convert_currency(Currency::getAll()->firstWhere('default')->code, '', $maxPrice);

        if (!$data['min_price']) {
            $data['min_price'] = $data['default_min_price'];
            $data['max_price'] = $data['default_max_price'];
        }

        $data['date_format'] = Settings::getAll()->firstWhere('name', 'date_format_type')->value;
        $today = Carbon::today();
        $checkinDate = $request->input('checkin') ? Carbon::parse($request->input('checkin')) : $today;
        $checkoutDate = $request->input('checkout') ? Carbon::parse($request->input('checkout')) : $today;

        $query = Properties::where('status', 'listed')
            ->where(function ($mainQuery) use ($location) {
                $mainQuery->where('name', 'like', "%{$location}%")
                    ->orWhereHas('property_address', function ($addressQuery) use ($location) {
                        $addressQuery->where('address_line_1', 'like', "%{$location}%")
                            ->orWhere('address_line_2', 'like', "%{$location}%")
                            ->orWhere('city', 'like', "%{$location}%")
                            ->orWhere('state', 'like', "%{$location}%")
                            ->orWhere('country', 'like', "%{$location}%")
                            ->orWhere('area', 'like', "%{$location}%")
                            ->orWhere('building', 'like', "%{$location}%")
                            ->orWhere('flat_no', 'like', "%{$location}%");
                    });
            })
            ->with(['users', 'property_price', 'property_address', 'bookings'])
            ->whereDoesntHave('bookings', function ($bookingQuery) use ($checkinDate, $checkoutDate) {
                $bookingQuery->where('status', 'Accepted')
                    ->where(function ($conflictQuery) use ($checkinDate, $checkoutDate) {
                        $conflictQuery->whereBetween('start_date', [$checkinDate, $checkoutDate])
                            ->orWhereBetween('end_date', [$checkinDate, $checkoutDate])
                            ->orWhere(function ($overlapQuery) use ($checkinDate, $checkoutDate) {
                                $overlapQuery->where('start_date', '<=', $checkinDate)
                                    ->where('end_date', '>=', $checkoutDate);
                            });
                    });
            });

        // Apply filters
        if ($request->has('space_type') && !empty($data['space_type_selected']) && $data['space_type_selected'][0] !== '') {
            $query->whereIn('space_type', $data['space_type_selected']);
        }

        if ($data['guest']) {
            $query->where('accommodates', '>=', $data['guest']);
        }

        if ($data['bedrooms']) {
            $query->where('bedrooms', '>=', $data['bedrooms']);
        }

        if ($data['beds']) {
            $query->where('beds', '>=', $data['beds']);
        }

        if ($data['bathrooms']) {
            $query->where('bathrooms', '>=', $data['bathrooms']);
        }

        if (!empty($data['property_type_selected']) && $data['property_type_selected'][0] !== '') {
            $query->whereIn('property_type', $data['property_type_selected']);
        }

        if (!empty($data['amenities_selected']) && $data['amenities_selected'][0] !== '') {
            $query->where(function ($q) use ($data) {
                foreach ($data['amenities_selected'] as $amenity) {
                    $q->where('amenities', 'like', "%{$amenity}%");
                }
            });
        }

        if ($data['min_price'] !== null || $data['max_price'] !== null) {
            $query->whereHas('property_price', function ($q) use ($data) {
                if ($data['min_price'] !== null) {
                    $q->where('price', '>=', $data['min_price']);
                }
                if ($data['max_price'] !== null) {
                    $q->where('price', '<=', $data['max_price']);
                }
            });
        }
        $data['properties'] = $query->orderBy('id', 'desc')->paginate(4);
        // Handle AJAX request
        if ($request->ajax()) {
            return view('search.view', $data)->render();
        }

        return view('search.view', $data);
    }

    public function searchResult(Request $request)
    {
        $full_address = $request->input('location');
        $today = Carbon::today();
        $checkinDate = $request->input('checkin') ? Carbon::parse($request->input('checkin')) : $today;
        $checkoutDate = $request->input('checkout') ? Carbon::parse($request->input('checkout')) : $today;
        $perPage = 5; // Number of properties per page
        $page = $request->input('page', 1);

        $query = Properties::where('status', 'listed')
            ->whereHas('property_address', function ($q) use ($full_address) {
                $q->where('address_line_1', 'like', "%{$full_address}%")
                    ->orWhere('address_line_2', 'like', "%{$full_address}%")
                    ->orWhere('city', 'like', "%{$full_address}%")
                    ->orWhere('state', 'like', "%{$full_address}%")
                    ->orWhere('country', 'like', "%{$full_address}%")
                    ->orWhere('area', 'like', "%{$full_address}%")
                    ->orWhere('building', 'like', "%{$full_address}%")
                    ->orWhere('flat_no', 'like', "%{$full_address}%");
            })
            ->whereDoesntHave('bookings', function ($query) use ($checkinDate, $checkoutDate) {
                $query->where(function ($q) use ($checkinDate, $checkoutDate) {
                    $q->whereBetween('start_date', [$checkinDate, $checkoutDate])
                        ->orWhereBetween('end_date', [$checkinDate, $checkoutDate])
                        ->orWhere(function ($q) use ($checkinDate, $checkoutDate) {
                            $q->where('start_date', '<=', $checkinDate)
                                ->where('end_date', '>=', $checkoutDate);
                        });
                })/* ->where('status', 'Accepted') */;
            });

        $total = $query->count();
        $properties = $query->skip(($page - 1) * $perPage)
            ->take($perPage)
            ->get();

        return response()->json([
            'properties' => $properties,
            'has_more' => ($page * $perPage) < $total
        ]);
    }

    public function content_read($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}
