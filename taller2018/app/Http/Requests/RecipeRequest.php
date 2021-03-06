<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeRequest extends FormRequest
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
            'description' => 'required|string|max:200',
            'ingredients'=> 'required|string|max:100',
            'dish' => 'required|numeric|max:11',
            'administrator' => 'required|numeric|max:11',
           // 'transaction_id'=>'',
           // 'transaction_date'=>'',
           // 'transaction_host'=>'',
           // 'transaction_user'=>'',
        ];
    }
}

