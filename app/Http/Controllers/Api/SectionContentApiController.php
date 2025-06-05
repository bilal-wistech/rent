<?php

namespace App\Http\Controllers\API;

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
            $validator = Validator::make($request->all(), [
                'type' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

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
