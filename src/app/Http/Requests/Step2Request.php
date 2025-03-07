<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Step2Request extends FormRequest
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
            'weight' => 'required|max:999.9|regex:/^\d{1,3}(\.\d{1})?$/',// 整数部最大3桁＋小数点以下1桁字
            'target_weight' => 'required|max:999.9|regex:/^\d{1,3}(\.\d{1})?$/',
        ];
    }

    public function messages()
    {
        return[

            'weight.required' => '現在の体重を入力してください',
            'weight.max' => '4桁までの数字で入力してください',
            'weight.regex' => '小数点は1桁で入力してください',
            'target_weight.required' => '目標の体重を入力してください',
            'target_weight.max' => '4桁までの数字で入力してください',
            'target_weight.regex' => '小数点は1桁で入力してください',
        ];
    }
}
