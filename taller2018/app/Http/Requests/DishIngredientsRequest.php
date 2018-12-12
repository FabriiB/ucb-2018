<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishIngredientsRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'quantity'=>'required',
            'id_ingredient'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'id_ingredient.required' => 'El ingrediente no puede ser nulo',
            'quantity.required' => 'La cantidad de ingrediente no puede ser nulo',
        ];
    }
}
