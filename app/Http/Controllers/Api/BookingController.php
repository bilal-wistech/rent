<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Invoice;
use App\Models\Bookings;
use App\Models\Currency;
use App\Models\Properties;
use App\Models\PricingType;
use App\Http\Helpers\Common;
use App\Models\PropertyFees;
use Illuminate\Http\Request;
use App\Models\PropertyDates;
use App\Models\PropertyPrice;
use App\Models\PaymentReceipt;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\AddBookingRequest;

class BookingController extends Controller
{
    public function getBookings(Request $request): JsonResponse
    {
        try {
            // Validate request parameters
            $validated = $request->validate([
                'slug' => 'required|exists:properties,slug',
                'checkin' => 'required|date|after_or_equal:today',
                'checkout' => 'required|date|after_or_equal:checkin',
                'pricing_type' => 'required',
                'guests' => 'required|integer|min:1',
            ]);

            // Fetch property
            $property = Properties::where('slug', $validated['slug'])->first();

            // Check for existing bookings (only active/confirmed bookings)
            $bookings = Bookings::where('property_id', $property->id)
                ->where(function ($query) use ($validated) {
                    $query->where('start_date', '<=', $validated['checkout'])
                        ->where('end_date', '>=', $validated['checkin']);
                })
                ->get();

            // Fetch property prices
            $propertyPrice = PropertyPrice::with('pricingType')
                ->where('property_id', $property->id)
                ->get();

            if ($bookings->isNotEmpty()) {
                // Eager load relationships only for the first booking if needed
                $booking = Bookings::with([
                    'properties.property_dates' => function ($query) use ($validated) {
                        $query->whereBetween('date', [$validated['checkin'], $validated['checkout']]);
                    },
                    'users'
                ])
                    ->find($bookings->first()->id);

                return response()->json([
                    'exists' => true,
                    'message' => sprintf(
                        'Booking from %s to %s already exists',
                        Carbon::parse($booking->start_date)->format('d-m-Y'),
                        Carbon::parse($booking->end_date)->format('d-m-Y')
                    ),
                    'data' => [
                        'booking_id' => $booking->id,
                        'booking' => $booking,
                        'property_dates' => $booking->properties->property_dates,
                        'user' => [
                            'user_id' => $booking->users->id,
                            'user_name' => $booking->users->first_name . ' ' . $booking->users->last_name,
                        ],
                        'property_price' => $propertyPrice,
                        'conflicting_bookings_count' => $bookings->count(),
                    ]
                ], 200);
            }

            $pricingType = PricingType::select('name', 'days')->where('status', 1)->get();
            $multiplierMapping = $pricingType->pluck('days', 'name')->toArray();

            $requestedPricingType = $validated['pricing_type'];
            $start = Carbon::parse($validated['checkin']);
            $end = Carbon::parse($validated['checkout']);
            $numberOfDays = $end->diffInDays($start);

            // Fetch pricing type details
            $pricingTypeDetail = PricingType::where('name', $requestedPricingType)->firstOrFail();
            // Determine applicable pricing type based on stay duration
            $effectivePricingType = $requestedPricingType;
            // Fetch property price for the effective pricing type
            $propertyPriceSingle = PropertyPrice::where('property_id', $property->id)
                ->where('property_type_id', $pricingTypeDetail->id)
                ->firstOrFail();

            $rateMultiplier = $multiplierMapping[ucfirst($effectivePricingType)];
            $perDayPrice = $propertyPriceSingle->price / $rateMultiplier;
            $totalPrice =  ($numberOfDays / $rateMultiplier) * $propertyPriceSingle->price;

            // Calculate additional fees
            $propertyFees = PropertyFees::pluck('value', 'field');
            $host_service_charge = ($propertyFees['host_service_charge'] / 100) * $totalPrice;
            $guest_service_charge = ($propertyFees['guest_service_charge'] / 100) * $totalPrice;
            $iva_tax = ($propertyFees['iva_tax'] / 100) * $totalPrice;
            $accomodation_tax = ($propertyFees['accomodation_tax'] / 100) * $totalPrice;

            $totalPriceWithOtherCharges = $totalPrice
                + $propertyPriceSingle->cleaning_fee
                + $propertyPriceSingle->security_fee
                + ($propertyPriceSingle->guest_fee * $validated['guests']);

            $totalPriceWithChargesAndFees = $totalPriceWithOtherCharges
                + $host_service_charge
                + $guest_service_charge
                + $iva_tax
                + $accomodation_tax;

            return response()->json([
                'exists' => false,
                'data' => [
                    'property_price' => $propertyPrice,
                    'pricing_type' => $effectivePricingType,
                    'number_of_days' => $numberOfDays,
                    'rate_multiplier' => $rateMultiplier,
                    'total_price' => round($totalPrice, 2),
                    'start_date' => $validated['checkin'],
                    'end_date' => $validated['checkout'],
                    'total_price_with_other_charges' => round($totalPriceWithOtherCharges, 2),
                    'total_price_with_charges_and_fees' => round($totalPriceWithChargesAndFees, 2),
                    'host_service_charge' => round($host_service_charge, 2),
                    'guest_service_charge' => round($guest_service_charge, 2),
                    'iva_tax' => round($iva_tax, 2),
                    'accomodation_tax' => round($accomodation_tax, 2),
                    'cleaning_fee' => $propertyPriceSingle->cleaning_fee,
                    'security_fee' => $propertyPriceSingle->security_fee,
                    'guest_fee' => $propertyPriceSingle->guest_fee * $validated['guests'],
                    'per_day_price' => round($perDayPrice, 2),
                ]
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'exists' => false,
                'errors' => $e->errors(),
                'message' => 'Validation failed'
            ], 422);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'exists' => false,
                'message' => 'Resource not found'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'exists' => false,
                'message' => 'An error occurred while processing the request',
                'exception' => $e->getMessage() . ' on line ' . $e->getLine()
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

    public function addBooking(AddBookingRequest $request): JsonResponse
    {
        // Check authentication and token validity
        $authCheck = $this->checkAuthenticatedUser();
        if (!$authCheck['authenticated']) {
            return $authCheck['response'];
        }

        $authenticatedUser = $authCheck['user'];
        $authenticatedUserId = $authenticatedUser->id;

        $currencyDefault = Currency::getAll()->where('default', 1)->first();
        $property = Properties::where('slug', $request->slug)->first();

        if (!$property) {
            return response()->json([
                'success' => false,
                'message' => 'Property not found'
            ], 404);
        }

        DB::beginTransaction();
        try {
            $status = 'booked not paid';
            $payment_status = 'unpaid';
            $start_date = date('Y-m-d', strtotime($request->check_in));
            $end_date = date('Y-m-d', strtotime($request->check_out));

            // Convert the start and end dates to timestamps
            $start_date_timestamp = strtotime($start_date);
            $end_date_timestamp = strtotime($end_date);
            $pricingType = PricingType::where('name', $request->pricing_type)->first();

            // Calculate the difference in days
            $min_days = ($end_date_timestamp - $start_date_timestamp) / 86400;

            $bookingData = [
                'property_id' => $property->id,
                'user_id' => $request->user_id ?? $authenticatedUserId,
                'host_id' => $property->host_id,
                'booking_added_by' => $authenticatedUserId,
                'start_date' => $request->check_in,
                'end_date' => $request->check_out,
                'guest' => $request->guests,
                'total_night' => $min_days,
                'service_charge' => Common::convert_currency('', $currencyDefault->code, $request->service_fee ?? 0),
                'host_fee' => Common::convert_currency('', $currencyDefault->code, $request->host_service_charge ?? 0),
                'iva_tax' => Common::convert_currency('', $currencyDefault->code, $request->iva_tax ?? 0),
                'accomodation_tax' => Common::convert_currency('', $currencyDefault->code, $request->accomodation_tax ?? 0),
                'guest_charge' => Common::convert_currency('', $currencyDefault->code, $request->guest_fee ?? 0),
                'security_money' => Common::convert_currency('', $currencyDefault->code, $request->security_fee ?? 0),
                'cleaning_charge' => Common::convert_currency('', $currencyDefault->code, $request->cleaning_fee ?? 0),
                'total' => Common::convert_currency('', $currencyDefault->code, $request->total_price ?? 0),
                'base_price' => Common::convert_currency('', $currencyDefault->code, $request->property_price ?? 0),
                'currency_code' => $currencyDefault->code,
                'booking_type' => 'request',
                'renewal_type' => 'none',
                'status' => 'pending',
                'cancellation' => $property->cancellation,
                'per_night' => Common::convert_currency('', $currencyDefault->code, $request->per_day_price ?? 0),
                'booking_property_status' => $status,
                'transaction_id' => '',
                'payment_method_id' => '',
                'pricing_type_id' => $pricingType->id,
                'buffer_days' => 0
            ];

            $booking = Bookings::create($bookingData);

            // Create an array of booked dates
            $bookedDates = [];
            for ($i = $start_date_timestamp; $i <= $end_date_timestamp; $i += 86400) {
                $bookedDates[] = date("Y-m-d", $i);
            }

            // Create new entries for booked dates
            foreach ($bookedDates as $date) {
                PropertyDates::create([
                    'property_id' => $property->id,
                    'booking_id' => $booking->id,
                    'date' => $date,
                    'price' => $request->per_day_price ?? 0,
                    'status' => 'booked not paid',
                    'min_day' => $min_days,
                    'min_stay' => $request->min_stay ? 1 : 0,
                ]);
            }

            $invoice = Invoice::create([
                'booking_id' => $booking->id,
                'property_id' => $property->id,
                'customer_id' => $request->user_id ?? $authenticatedUserId,
                'currency_code' => $currencyDefault->code,
                'created_by' => $authenticatedUserId,
                'invoice_date' => Carbon::now(),
                'due_date' => Carbon::now()->addDays(5),
                'description' => 'Booking invoice for ' . $property->name,
                'sub_total' => Common::convert_currency('', $currencyDefault->code, $request->total_price),
                'grand_total' => Common::convert_currency('', $currencyDefault->code, $request->total_price),
                'payment_status' => $payment_status
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Booking created successfully',
                'booking' => $booking,
                'invoice' => $invoice
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Booking not created: ' . $e->getMessage()
            ], 500);
        }
    }

    public function myBookings(Request $request): JsonResponse
    {
        try {
            // Check authentication and token validity
            $authCheck = $this->checkAuthenticatedUser();
            if (!$authCheck['authenticated']) {
                return $authCheck['response'];
            }

            $user = $authCheck['user'];

            // Get pagination parameters with validation
            $perPage = $request->input('per_page', 5);
            $page = $request->input('page', 1);

            // Validate pagination inputs
            $request->validate([
                'per_page' => 'integer|min:1|max:100',
                'page' => 'integer|min:1',
            ]);

            // Build the query
            $query = Bookings::query()
                ->join('properties', 'properties.id', '=', 'bookings.property_id')
                ->join('users as guests', 'guests.id', '=', 'bookings.user_id')
                ->join('currency', 'currency.code', '=', 'bookings.currency_code')
                ->join('users as hosts', 'hosts.id', '=', 'bookings.host_id')
                ->join('property_address as pa', 'properties.id', '=', 'pa.property_id')
                ->select([
                    'bookings.id',
                    'hosts.first_name as host_name',
                    'guests.first_name as guest_name',
                    'bookings.property_id',
                    'properties.name as property_name',
                    'bookings.total as total_amount',
                    'bookings.payment_method_id',
                    'bookings.status',
                    'bookings.created_at',
                    'bookings.updated_at',
                    'bookings.start_date',
                    'bookings.end_date',
                    'bookings.guest as guests',
                    'hosts.id as host_id',
                    'guests.id as user_id',
                    'bookings.currency_code',
                    'currency.symbol',
                    'bookings.service_charge',
                    'bookings.host_fee',
                    'bookings.iva_tax',
                    'bookings.accomodation_tax',
                    'bookings.booking_property_status',
                    'pa.city',
                    'pa.state',
                    'pa.country',
                    'pa.area',
                    'pa.building',
                    'pa.flat_no',
                ])
                ->where('bookings.user_id', $user->id);

            // Execute query with pagination
            $bookings = $query->paginate($perPage, ['*'], 'page', $page);

            // Format results
            $formattedBookings = $bookings->getCollection()->map(function ($booking) {
                // Format location
                $locationParts = array_filter([
                    $booking->flat_no ? "Flat {$booking->flat_no}" : null,
                    $booking->building,
                    $booking->area,
                    $booking->city,
                    $booking->country,
                ]);

                return [
                    'id' => $booking->id,
                    'host' => [
                        'id' => $booking->host_id,
                        'name' => ucfirst($booking->host_name),
                    ],
                    'guest' => [
                        'id' => $booking->user_id,
                        'name' => ucfirst($booking->guest_name),
                    ],
                    'property' => [
                        'id' => $booking->property_id,
                        'name' => ucfirst($booking->property_name),
                    ],
                    'location' => implode(', ', $locationParts),
                    'start_date' => Carbon::parse($booking->start_date)->format('Y-m-d'),
                    'end_date' => Carbon::parse($booking->end_date)->format('Y-m-d'),
                    'total_amount' => $this->formatMoney($booking->symbol, $booking->total_amount),
                    'status' => $booking->status,
                    'booking_property_status' => $booking->booking_property_status,
                    'created_at' => Carbon::parse($booking->created_at)->format('Y-m-d H:i:s'),
                ];
            });

            return response()->json([
                'success' => true,
                'data' => $formattedBookings,
                'pagination' => [
                    'total' => $bookings->total(),
                    'per_page' => $bookings->perPage(),
                    'current_page' => $bookings->currentPage(),
                    'last_page' => $bookings->lastPage(),
                    'from' => $bookings->firstItem(),
                    'to' => $bookings->lastItem(),
                ],
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Error fetching bookings: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while fetching bookings',
            ], 500);
        }
    }

    private function formatMoney($symbol, $amount): string
    {
        return $symbol . number_format($amount, 2);
    }

    public function viewMyBooking(Request $request): JsonResponse
    {
        try {
            // Check authentication and token validity
            $authCheck = $this->checkAuthenticatedUser();
            if (!$authCheck['authenticated']) {
                return $authCheck['response'];
            }

            $user = $authCheck['user'];

            // Validate request parameters
            $request->validate([
                'booking_id' => 'required|integer|exists:bookings,id',
            ]);

            // Get the specific booking for the authenticated user
            $booking = Bookings::query()
                ->join('properties', 'properties.id', '=', 'bookings.property_id')
                ->join('users as guests', 'guests.id', '=', 'bookings.user_id')
                ->join('currency', 'currency.code', '=', 'bookings.currency_code')
                ->join('users as hosts', 'hosts.id', '=', 'bookings.host_id')
                ->join('property_address as pa', 'properties.id', '=', 'pa.property_id')
                ->select([
                    'bookings.*',
                    'hosts.first_name as host_name',
                    'hosts.last_name as host_last_name',
                    'hosts.email as host_email',
                    'guests.first_name as guest_name',
                    'guests.last_name as guest_last_name',
                    'properties.name as property_name',
                    'properties.slug as property_slug',
                    'currency.symbol',
                    'pa.city',
                    'pa.state',
                    'pa.country',
                    'pa.area',
                    'pa.building',
                    'pa.flat_no',
                    'pa.address_line_1',
                    'pa.address_line_2',
                ])
                ->where('bookings.id', $request->booking_id)
                ->where('bookings.user_id', $user->id)
                ->first();

            if (!$booking) {
                return response()->json([
                    'success' => false,
                    'message' => 'Booking not found or you do not have permission to view this booking',
                ], 404);
            }

            // Format location
            $locationParts = array_filter([
                $booking->flat_no ? "Flat {$booking->flat_no}" : null,
                $booking->building,
                $booking->area,
                $booking->city,
                $booking->state,
                $booking->country,
            ]);

            $formattedBooking = [
                'id' => $booking->id,
                'host' => [
                    'id' => $booking->host_id,
                    'name' => ucfirst($booking->host_name) . ' ' . ucfirst($booking->host_last_name),
                    'email' => $booking->host_email,
                ],
                'property' => [
                    'id' => $booking->property_id,
                    'name' => ucfirst($booking->property_name),
                    'slug' => $booking->property_slug,
                ],
                'location' => [
                    'formatted' => implode(', ', $locationParts),
                    'address_line_1' => $booking->address_line_1,
                    'address_line_2' => $booking->address_line_2,
                    'city' => $booking->city,
                    'state' => $booking->state,
                    'country' => $booking->country,
                ],
                'dates' => [
                    'start_date' => Carbon::parse($booking->start_date)->format('Y-m-d'),
                    'end_date' => Carbon::parse($booking->end_date)->format('Y-m-d'),
                    'total_nights' => $booking->total_night,
                ],
                'guests' => $booking->guest,
                'pricing' => [
                    'base_price' => $this->formatMoney($booking->symbol, $booking->base_price),
                    'per_night' => $this->formatMoney($booking->symbol, $booking->per_night),
                    'service_charge' => $this->formatMoney($booking->symbol, $booking->service_charge),
                    'host_fee' => $this->formatMoney($booking->symbol, $booking->host_fee),
                    'iva_tax' => $this->formatMoney($booking->symbol, $booking->iva_tax),
                    'accommodation_tax' => $this->formatMoney($booking->symbol, $booking->accomodation_tax),
                    'guest_charge' => $this->formatMoney($booking->symbol, $booking->guest_charge),
                    'security_money' => $this->formatMoney($booking->symbol, $booking->security_money),
                    'cleaning_charge' => $this->formatMoney($booking->symbol, $booking->cleaning_charge),
                    'total_amount' => $this->formatMoney($booking->symbol, $booking->total),
                    'currency' => $booking->currency_code,
                ],
                'status' => [
                    'booking_status' => $booking->status,
                    'property_status' => $booking->booking_property_status,
                    'payment_status' => $booking->payment_status ?? 'pending',
                ],
                'booking_details' => [
                    'booking_type' => $booking->booking_type,
                    'renewal_type' => $booking->renewal_type,
                    'cancellation_policy' => $booking->cancellation,
                    'transaction_id' => $booking->transaction_id,
                    'payment_method_id' => $booking->payment_method_id,
                ],
                'created_at' => Carbon::parse($booking->created_at)->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::parse($booking->updated_at)->format('Y-m-d H:i:s'),
            ];

            return response()->json([
                'success' => true,
                'data' => $formattedBooking
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Error fetching booking details: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while fetching booking details',
            ], 500);
        }
    }
}
