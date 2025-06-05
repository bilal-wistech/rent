<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceStoreRequest;
use App\Models\Service;

class ServiceController extends Controller
{
    public function store(ServiceStoreRequest $request)
    {
        try {
            $service = Service::create($request->validated());

            return response()->json([
                'status' => 'success',
                'message' => 'Service request created successfully',
                'data' => $service
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create service request',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
