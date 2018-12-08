<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'date_created' => 'required|date|min:today',
            'date_end'=> 'required|date|min:+1 week' ,
            'name' => 'required|string|max:200',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El nombre del menu no puede ser nulo',
            'date_created.required'  => 'La fecha de inicio no puede ser nula y no debe ser menor a la de hoy',
            'date_created.min'  => 'La fecha de inicio no debe ser menor a la de hoy',
            'date_end.required' => 'La fecha de fin no puede ser nula ',
            'date_end.min'  => 'La fecha de fin debe ser 7 dias mayor a la fecha de hoy',
        ];
    }
}
