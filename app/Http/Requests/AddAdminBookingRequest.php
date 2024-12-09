<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddAdminBookingRequest extends FormRequest
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
            'start_date' => [
                'required',
                // 'date',
                // 'after_or_equal:today',
            ],
            'end_date' => [
                'required',
                'date',
                'after:start_date',
            ],
            'user_id' => 'required',
            'number_of_guests' => 'required',
            'renewal_type' => 'required',
            'status' => 'required',
        ];
    }
}
