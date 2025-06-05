<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ServiceStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Adjust authorization logic as needed
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'section_content_id' => 'required|exists:section_contents,id',
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'no_of_guests' => 'required|integer|min:1',
            'preferred_date' => 'required|date',
            'preferred_time' => 'required|date_format:H:i',
            'notes' => 'nullable|string'
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'section_content_id.required' => 'The section content ID is required.',
            'section_content_id.exists' => 'The selected section content is invalid.',
            'full_name.required' => 'The full name is required.',
            'full_name.string' => 'The full name must be a string.',
            'full_name.max' => 'The full name may not be greater than 255 characters.',
            'phone.required' => 'The phone number is required.',
            'phone.string' => 'The phone number must be a string.',
            'phone.max' => 'The phone number may not be greater than 20 characters.',
            'no_of_guests.required' => 'The number of guests is required.',
            'no_of_guests.integer' => 'The number of guests must be an integer.',
            'no_of_guests.min' => 'The number of guests must be at least 1.',
            'preferred_date.required' => 'The preferred date is required.',
            'preferred_date.date' => 'The preferred date must be a valid date.',
            'preferred_time.required' => 'The preferred time is required.',
            'preferred_time.date_format' => 'The preferred time must be in HH:MM format.',
            'notes.string' => 'The notes must be a string.'
        ];
    }
}
