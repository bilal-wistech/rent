<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Properties;
use App\Models\Bookings;
use App\Models\PropertyPrice;
use App\Models\PricingType;
use App\Models\PropertyFees;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

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
            $totalPrice = $effectivePricingType === 'Monthly' ? $propertyPriceSingle->price : ($numberOfDays / $rateMultiplier) * $propertyPriceSingle->price;

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
}
