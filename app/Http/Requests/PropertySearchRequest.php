<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertySearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'location' => 'nullable|string|max:255',
            'checkin' => 'nullable|date_format:Y-m-d',
            'checkout' => 'nullable|date_format:Y-m-d|after_or_equal:checkin',
            'guests' => 'nullable|integer|min:1',
            'min_bedrooms' => 'nullable|integer|min:0',
            'min_beds' => 'nullable|integer|min:0',
            'min_bathrooms' => 'nullable|integer|min:0',
            'min_price' => 'nullable|numeric|min:0',
            'max_price' => 'nullable|numeric|min:0|gte:min_price',
            'property_type' => 'nullable|array',
            'property_type.*' => 'exists:property_types,id',
            'space_type' => 'nullable|array',
            'space_type.*' => 'exists:space_types,id',
            'amenities' => 'nullable|array',
            'amenities.*' => 'exists:amenities,id'
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'checkin.date_format' => 'The check-in date must be in YYYY-MM-DD format.',
            'checkout.date_format' => 'The check-out date must be in YYYY-MM-DD format.',
            'checkout.after_or_equal' => 'The check-out date must be on or after the check-in date.',
            'max_price.gte' => 'The maximum price must be greater than or equal to the minimum price.'
        ];
    }
}