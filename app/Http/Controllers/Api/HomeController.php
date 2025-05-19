<?php

namespace App\Http\Controllers\Api;

use App\Models\Area;
use App\Models\Properties;
use App\Models\Testimonials;
use Illuminate\Http\Request;
use App\Models\PropertyAddress;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

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
            $areas = Area::select('id','country_id','city_id','name','image')->where('show_on_front', 1)->get();
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
            $properties = Properties::vacantToday();
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
                'message' => 'Something went wrong while Vacant Properties.',
            ], 500);
        }
    }
}
