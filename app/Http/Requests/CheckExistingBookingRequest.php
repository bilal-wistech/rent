<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckExistingBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'property_id' => 'required',
            'checkin' => [
                'required',
                'date',
                'after_or_equal:today',
            ],
            'checkout' => [
                'required',
                'date',
                'after_or_equal:checkin',
            ],
        ];
    }
}
