<?php

namespace App\Http\Controllers\Admin;

use DB;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\{
    User,
    Properties,
    Bookings
};

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today()->toDateString(); // Get today's date in 'Y-m-d' format

        // Step 1: Get all vacant property IDs (not booked today)
        $vacantPropertyIds = Properties::whereDoesntHave('bookings', function ($query) use ($today) {
            $query->whereDate('start_date', '<=', $today)
                ->whereDate('end_date', '>=', $today);
        })->pluck('id');

        // Step 2: Paginate the vacant properties
        $perPage = 5; // Change this to the desired number of items per page
        $currentPage = request()->get('page', 1);
        $offset = ($currentPage - 1) * $perPage;

        $vacantProperties = [];

        // Step 3: Loop through each vacant property and get the latest booking (if it exists)
        foreach ($vacantPropertyIds->slice($offset, $perPage) as $propertyId) {
            $latestBooking = Bookings::where('property_id', $propertyId)
                ->orderBy('end_date', 'desc') // Get the latest booking by end date
                ->first();

            // Step 4: Store property data with the 'vacant since' date
            $vacantSince = $latestBooking ? $latestBooking->end_date : 'Yet Not booked';

            // Get the property name directly using the property ID
            $property = Properties::find($propertyId);
            $propertiesName = $property ? $property->name : 'Unknown Property';

            $vacantProperties[] = [
                'property_id' => $propertyId,
                'vacant_since' => $vacantSince,
                'propertiesName' => $propertiesName,
            ];
        }

        // Create a LengthAwarePaginator for vacant properties
        $vacantPropertiesPaginated = new LengthAwarePaginator(
            $vacantProperties,
            $vacantPropertyIds->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );


        $data['total_users_count'] = User::count();
        $data['total_property_count'] = Properties::count();
        $data['total_reservations_count'] = Bookings::count();

        $data['today_users_count'] = User::whereDate('created_at', DB::raw('CURDATE()'))->count();
        $data['today_property_count'] = Properties::whereDate('created_at', DB::raw('CURDATE()'))->count();
        $data['today_reservations_count'] = Bookings::whereDate('created_at', DB::raw('CURDATE()'))->count();

        $properties = new Properties;
        $data['propertiesList'] = $properties->getLatestProperties();

        $bookings = new Bookings;
        $data['bookingList'] = $bookings->getBookingLists();
        $data['vacantProperties'] = $vacantPropertiesPaginated; // Use the paginated properties

        return view('admin.dashboard', $data);
    }

}
