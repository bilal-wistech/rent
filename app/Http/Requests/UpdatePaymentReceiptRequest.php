<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentReceiptRequest extends FormRequest
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
        $paymentReceipt = $this->route('payment_receipt');

        // Access the booking related to this payment receipt
        $amount = $paymentReceipt->amount;

        return [
            'amount' => 'required|numeric|min:' . ($amount + 1),
        ];
    }
    public function messages()
    {
        return [
            'amount.required' => 'The payment amount is required.',
            'amount.numeric' => 'The payment amount must be a valid number.',
            'amount.min' => 'The payment amount must be greater than the already paid amount.',
        ];
    }
}
