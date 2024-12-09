<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SecurityRefundRequest extends FormRequest
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
            'security_refund_date' => 'required',
            'security_refund_amount' => 'required',
            'security_refund_paid_through' => 'required',
            'description' => 'nullable',
            'recieved_by' => 'required',
        ];
    }
}
