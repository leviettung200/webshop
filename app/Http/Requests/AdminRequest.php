<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'title'=>'required|max:255',
            'image'=>'image',
            'phone'=>'required|min:9',
            'summary'=>'required',
            'description'=>'required',
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
            'max|min' => ':attribute quá dài/ngắn',
            'email' =>  ':attribute không hợp lệ',
            'image' =>  'Không đúng định dạng :attribute',
        ];

    }
    public function attributes()
    {
        return [
            'title' => 'Tiêu đề',
            'message' => 'Nội dung',
            'phone' => 'Số điện thoại',
            'email' => 'Email',
            'image' => 'Ảnh',
        ];
    }
}
