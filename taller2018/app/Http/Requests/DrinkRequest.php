<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class DrinkRequest extends FormRequest
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
        $tfecha = Carbon::now();
        return [
            'name'=> 'required|string|max:100',
            'type'=> 'required|string|max:100',
            'caducity_date'=>'required|date|after:+1 week',
            'packaging_date'=>'required|date|before:today',
            'description'=> 'required|string|max:100',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El nombre de la bebida no puede ser nulo',
            'caducity_date.required' => 'La fecha de caducidad de la bebida no puede ser nulo',
            'packaging_date.required' => 'La fecha de empaque de la bebida no puede ser nulo',
            'name.max' => 'El nombre de la bebida debe tener un maximo de 100 caracteres',
            'type.required'  => 'El tipo de la bebida no puede ser nulo',
            'type.max' => 'El nombre de la bebida debe tener un maximo de 100 caracteres',
            'caducity_date.after'  => 'La fecha de caducidad no debe ser al menor 7 dias mayor a la de hoy',
            'packaging_date.before' => 'La fecha de empaque no debe ser mayor a la de hoy',
            'description.required'  => 'La descripcion no debe ser nula',
            'description.max' => 'La descripcion de la bebida debe tener un maximo de 100 caracteres',
        ];
    }
}
