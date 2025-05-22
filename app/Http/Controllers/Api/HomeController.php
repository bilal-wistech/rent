<?php

namespace App\Http\Controllers\Api;

use App\Models\Area;
use App\Models\Amenities;
use App\Models\Properties;
use App\Models\Testimonials;
use Illuminate\Http\Request;
use App\Models\PropertyPrice;
use App\Models\PropertyAddress;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\PricingType;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function areas(): JsonResponse
    {
        try {
            $areas = Area::select('id', 'country_id', 'city_id', 'name', 'image')->where('show_on_front', 1)->get();
            $propertyCount = PropertyAddress::countByArea();

            // Add property_count to each area
            $areas = $areas->map(function ($area) use ($propertyCount) {
                $count = $propertyCount->firstWhere('area', $area->name)?->count ?? 0;
                $area->property_count = $count;
                return $area;
            });

            return response()->json([
                'success' => true,
                'message' => 'Areas fetched successfully',
                'data' => [
                    'areas' => $areas,
                    'propertyCount' => $propertyCount,
                ]
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching Areas', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while Areas.',
            ], 500);
        }
    }
    public function testimonials(): JsonResponse
    {
        try {
            $testimonials = Testimonials::getAll();
            return response()->json([
                'success' => true,
                'message' => 'Testimonials fetched successfully',
                'data' => [
                    'testimonials' => $testimonials,
                ]
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching testimonials', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while testimonials.',
            ], 500);
        }
    }
    public static function vacantProperties(): JsonResponse
    {
        try {
            $properties = Properties::vacantToday()->map(function ($property) {
                // Process amenities
                $amenityIds = $property->amenities ? array_filter(explode(',', $property->amenities), 'is_numeric') : [];
                $property->amenities = $amenityIds
                    ? Amenities::whereIn('id', $amenityIds)->select('id', 'title')->get()->toArray()
                    : [];

                // Fetch all prices for the property
                $prices = PropertyPrice::with('pricingType')
                    ->where('property_id', $property->id)
                    ->get()
                    ->map(function ($price) {
                        return [
                            'id' => $price->id,
                            'property_id' => $price->property_id,
                            'cleaning_fee' => $price->cleaning_fee,
                            'guest_after' => $price->guest_after,
                            'guest_fee' => $price->guest_fee,
                            'security_fee' => $price->security_fee,
                            'price' => $price->price,
                            'weekend_price' => $price->weekend_price,
                            'weekly_discount' => $price->weekly_discount,
                            'monthly_discount' => $price->monthly_discount,
                            'currency_code' => $price->currency_code,
                            'property_type_id' => $price->property_type_id,
                            'original_cleaning_fee' => $price->original_cleaning_fee,
                            'original_guest_fee' => $price->original_guest_fee,
                            'original_price' => $price->original_price,
                            'original_weekend_price' => $price->original_weekend_price,
                            'original_security_fee' => $price->original_security_fee,
                            'default_code' => $price->default_code,
                            'default_symbol' => $price->default_symbol,
                            'pricing_type' => $price->pricingType ? [
                                'id' => $price->pricingType->id,
                                'name' => $price->pricingType->name,
                                'days' => $price->pricingType->days,
                                'status' => $price->pricingType->status,
                                'created_at' => $price->pricingType->created_at,
                                'updated_at' => $price->pricingType->updated_at,
                            ] : null,
                        ];
                    })->toArray();

                // Structure the property data
                return [
                    'id' => $property->id,
                    'name' => $property->name,
                    'slug' => $property->slug,
                    'url_name' => $property->url_name,
                    'host_id' => $property->host_id,
                    'bedrooms' => $property->bedrooms,
                    'beds' => $property->beds,
                    'bed_type' => $property->bed_type,
                    'bathrooms' => $property->bathrooms,
                    'amenities' => $property->amenities,
                    'property_type' => $property->property_type,
                    'space_type' => $property->space_type,
                    'accommodates' => $property->accommodates,
                    'booking_type' => $property->booking_type,
                    'cancellation' => $property->cancellation,
                    'status' => $property->status,
                    'recomended' => $property->recomended,
                    'is_verified' => $property->is_verified,
                    'deleted_at' => $property->deleted_at,
                    'created_at' => $property->created_at,
                    'updated_at' => $property->updated_at,
                    'steps_completed' => $property->steps_completed,
                    'space_type_name' => $property->space_type_name,
                    'property_type_name' => $property->property_type_name,
                    'property_photo' => $property->property_photo,
                    'host_name' => $property->host_name,
                    'book_mark' => $property->book_mark,
                    'reviews_count' => $property->reviews_count,
                    'overall_rating' => $property->overall_rating,
                    'cover_photo' => $property->cover_photo,
                    'avg_rating' => $property->avg_rating,
                    'users' => $property->users ? [
                        'id' => $property->users->id,
                        'first_name' => $property->users->first_name,
                        'last_name' => $property->users->last_name,
                        'email' => $property->users->email,
                        'phone' => $property->users->phone,
                        'formatted_phone' => $property->users->formatted_phone,
                        'carrier_code' => $property->users->carrier_code,
                        'default_country' => $property->users->default_country,
                        'profile_image' => $property->users->profile_image,
                        'balance' => $property->users->balance,
                        'status' => $property->users->status,
                        'deleted_at' => $property->users->deleted_at,
                        'created_at' => $property->users->created_at,
                        'updated_at' => $property->users->updated_at,
                        'profile_src' => $property->users->profile_src,
                    ] : null,
                    'property_price' => $prices, // Include all prices
                    'property_address' => $property->property_address ? [
                        'id' => $property->property_address->id,
                        'property_id' => $property->property_address->property_id,
                        'address_line_1' => $property->property_address->address_line_1,
                        'address_line_2' => $property->property_address->address_line_2,
                        'latitude' => $property->property_address->latitude,
                        'longitude' => $property->property_address->longitude,
                        'city' => $property->property_address->city,
                        'state' => $property->property_address->state,
                        'country' => $property->property_address->country,
                        'postal_code' => $property->property_address->postal_code,
                        'area' => $property->property_address->area,
                        'building' => $property->property_address->building,
                        'flat_no' => $property->property_address->flat_no,
                    ] : null,
                    'bookings' => $property->bookings ? $property->bookings->toArray() : [],
                    'pricingTypes' => PricingType::where('status',1)->get(),
                ];
            });

            return response()->json([
                'success' => true,
                'message' => 'Vacant Properties fetched successfully',
                'data' => [
                    'properties' => $properties,
                ]
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching Vacant Properties', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong while fetching Vacant Properties.',
            ], 500);
        }
    }
}
