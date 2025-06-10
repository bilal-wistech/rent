<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SectionContent;
use Illuminate\Http\JsonResponse;

class SectionContentApiController extends Controller
{
    /**
     * Get section contents by type
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getContent(Request $request): JsonResponse
    {
        try {
            $contents = SectionContent::where('type', $request->type)->get();

            return response()->json([
                'status' => 'success',
                'data' => $contents,
                'count' => $contents->count()
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve section contents: ' . $e->getMessage()
            ], 500);
        }
    }
}
