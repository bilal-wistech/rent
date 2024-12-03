<?php

namespace App\Http\Controllers\Admin;

use DB;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator; // Import LengthAwarePaginator
use App\Models\{
    User,
    Properties,
    Bookings,
    PaymentReceipt,
    PropertyDates
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
        $vacantPropertiesPaginated = new LengthAwarePaginator(
            $vacantProperties,
            $vacantPropertyIds->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        // Step 2: Get the paymentReceiptIds as a collection
        $paymentReceiptIds = PaymentReceipt::pluck('booking_id');

        // Step 3: Paginate paymentReceiptIds using slice
        $paginatedReceiptIds = $paymentReceiptIds->slice($offset, $perPage);

        // Step 4: Query PropertyDates using the paginated booking IDs
        $receipts = PropertyDates::with(['properties', 'bookings'])
            ->whereIn('booking_id', $paginatedReceiptIds->toArray())
            ->whereIn('status', ['booked not paid', 'booked but not fully paid'])
            ->get();

        // Step 5: Prepare the data for each receipt
        $paginatedPaymentReceipts = $receipts->map(function ($receipt) {
            return [
                'status' => $receipt->status,
                'booking' => $receipt->bookings ? $receipt->bookings->toArray() : [],
                'receipts' => $receipt->bookings->paymentReceipts ? $receipt->bookings->paymentReceipts->toArray() : [],
                'properties' => $receipt->bookings->properties ? $receipt->bookings->properties->toArray() : [],
            ];
        })->toArray();

        // Step 6: Create LengthAwarePaginator
        $paginatedPaymentReceiptsData = new LengthAwarePaginator(
            $paginatedPaymentReceipts, // Paginated data
            $paymentReceiptIds->count(), // Total records count for pagination
            $perPage, // Records per page
            $currentPage, // Current page
            ['path' => request()->url(), 'query' => request()->query()] // Preserve query parameters for pagination links
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
        $data['paymentReceipts'] = $paginatedPaymentReceiptsData;
        return view('admin.dashboard', $data);
    }
}
