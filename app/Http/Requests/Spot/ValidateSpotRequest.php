<?php

namespace App\Http\Requests\Spot;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSpotRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'longitude' => 'float|required|min:-180|max:180',
            'lattitude' => 'float|required|min:-90|max:90',
        ];
    }
}
