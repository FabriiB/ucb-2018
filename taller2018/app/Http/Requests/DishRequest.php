<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishRequest extends FormRequest
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
            'nombre'=> 'required|string|max:100',
            'descripcion'=> 'required|string|max:1000',
            'tipo'=> 'required|string|max:50',
            'porcion'=> 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' => 'El nombre del plato no puede ser nulo',
            'descripcion.required' => 'El descripcion del plato no puede ser nulo',
            'tipo.required' => 'El tipo del plato no puede ser nulo',
            'porcion.required' => 'El porcion del plato no puede ser nulo',
        ];
    }
}
