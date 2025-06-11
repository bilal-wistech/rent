<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'first_name' => 'sometimes|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'email' => ['sometimes', 'email', 'max:255', Rule::unique('users')->ignore(auth()->id())],
            'phone' => 'sometimes|string|max:20|nullable',
            'current_password' => 'sometimes|string|required_with:new_password',
            'new_password' => 'sometimes|string|min:8|confirmed|required_with:current_password',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'first_name.string' => 'The first name must be a string.',
            'first_name.max' => 'The first name may not be greater than 255 characters.',
            'last_name.string' => 'The last name must be a string.',
            'last_name.max' => 'The last name may not be greater than 255 characters.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'email.max' => 'The email may not be greater than 255 characters.',
            'phone.string' => 'The phone number must be a string.',
            'phone.max' => 'The phone number may not be greater than 20 characters.',
            'current_password.string' => 'The current password must be a string.',
            'current_password.required_with' => 'The current password is required when changing the password.',
            'new_password.string' => 'The new password must be a string.',
            'new_password.min' => 'The new password must be at least 8 characters.',
            'new_password.confirmed' => 'The new password confirmation does not match.',
            'new_password.required_with' => 'The new password is required when current password is provided.',
            'new_password_confirmation.string' => 'The password confirmation must be a string.',
            'new_password_confirmation.required_with' => 'The password confirmation is required when new password is provided.'
        ];
    }
}
