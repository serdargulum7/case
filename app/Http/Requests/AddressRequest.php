<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'id' => 'integer|nullable',
            'person_id' => 'required|integer|min:1',
            'address' => 'required|max:255|min:5',
            'postcode' => 'nullable|max:100',
            'city_name' => 'required|max:100|min:5',
            'country_name' => 'required|max:100|min:5',

        ];
    }
}
