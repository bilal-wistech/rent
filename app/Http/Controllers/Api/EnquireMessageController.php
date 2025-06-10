<?php

namespace App\Http\Controllers\Api;

use App\Models\EnquiryMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreEnquireMessageRequest;

class EnquireMessageController extends Controller
{
    /**
     * Store a newly created enquire message in storage.
     */
    public function store(StoreEnquireMessageRequest $request)
    {
        $message = EnquiryMessage::create($request->validated());

        return response()->json([
            'status' => 'success',
            'data' => $message
        ], 201);
    }
}
