<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'name'=>'required|max:255',
            'email'=>'required|email',
            'phone'=>'required|min:9',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống',
            'min' => ':attribute quá ngắn',
            'max' => ':attribute quá dài',
            'email' =>  ':attribute không hợp lệ',
        ];

    }
    public function attributes()
    {
        return [
            'name' => 'Họ tên',
            'phone' => 'Số điện thoại',
            'email' => 'Email',
        ];
    }
//    public function withValidator($validator)
//    {
//        $validator->after(function ($validator) {
//            $validator->errors()->add('field', 'Something is wrong with this field!');
//        });
//
//
//    }
}
