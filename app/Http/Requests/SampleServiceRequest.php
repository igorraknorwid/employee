<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SampleServiceRequest extends FormRequest
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
            'sample_service_title' => 'required|string',
             'sample_service_price' => 'required|string',
             'sample_service_time' => 'required|integer|min:1',
             'IsActive' => 'required|boolean',
             'IsDentistOnly'=> 'required|boolean',
             'IsClientVisible'=> 'required|boolean',
        ];
    }
}
