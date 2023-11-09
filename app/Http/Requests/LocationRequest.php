<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'location_name' => 'required|string',
            'isActive' => 'boolean',
            'google_map_link' => 'nullable|string',
            'isMapActive' => 'boolean',
            'city' => 'nullable|string',
            'street' => 'nullable|string',
            'zip_code' => 'nullable|string',
            'local_number' => 'nullable|string',
        ];
    }
}
