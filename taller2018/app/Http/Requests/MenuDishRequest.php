<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuDishRequest extends FormRequest
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
            'date_start' => 'string|max:200',
            'date_end'=> 'string|max:100',
            //'name' => 'required|string|max:100',
            //'id_administrator' => 'required|numeric|max:11',
            // 'transaction_id'=>'',
            // 'transaction_date'=>'',
            // 'transaction_host'=>'',
            // 'transaction_user'=>'',

        ];
    }
}
