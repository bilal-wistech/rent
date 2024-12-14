<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPaymentReceiptRequest extends FormRequest
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
            'booking_id' => 'required',
            'paid_through' => 'required',
            'payment_date' => 'required|date',
            'amount' => 'required|numeric'
        ];
    }
    public function messages()
    {
        return [
            'booking_id.required' => 'Please select a booking',
            'paid_through.required' => 'Please Select a paid through method',
            'payment_date.required' => 'Payment date required',
            'payment_date.date' => 'Invalid date entered',
            'amount.required' => 'The payment amount is required.',
            'amount.numeric' => 'The payment amount must be a valid number.',
        ];
    }
}
