<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class PropertyListingRequest extends FormRequest
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
            'property_type_id'  => 'required',
            'space_type'        => 'required',
            'accommodates'      => 'required',
            'country' => 'required',
            'area' => 'required',
            'city' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'property_type_id.required' => 'Please select a property type.',
            'space_type.required' => 'Space type required.',
            'accommodates.min' => 'The property must accommodate at least one guest.',
            'country.required' => 'Country Required',
            'area.required' => 'Area Required',
            'city.required' => 'City Required'
        ];
    }
}
