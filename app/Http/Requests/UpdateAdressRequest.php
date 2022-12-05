<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdressRequest extends FormRequest
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
     * @return array validierte Daten für Adresse
     */
    public function rules()
    {
        return [
            'street' => 'required|string|min:2|max:50',
            'number' => 'required|numeric|min:2|max:50',
            'city' => 'required|string|min:2|max:50',
            'zip' => 'required|numeric|min:2',
            'country' => 'required',
        ];
    }
}
