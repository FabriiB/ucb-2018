<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeassureRequest extends FormRequest
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
            'unit' => 'required|string|max:50',
            'name' => 'required|string|max:50',
            'type' => 'required|string|max:50',
        ];
    }
    public function messages()
    {
        return [
            'unit.required'=>'La unidad de la medida no puede ser nulo',
            'unit.max'=>'La unidad de la medida no puede tener mas de 50 caracteres.',
            'name.required' => 'El nombre de la bebida no puede ser nulo',
            'name.max' => 'El nombre de la bebida debe tener un maximo de 50 caracteres',
        ];
    }
}
