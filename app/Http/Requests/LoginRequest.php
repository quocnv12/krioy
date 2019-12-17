<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'phone'=>'required|min:10|max:10',
            'password'=>'required|min:8'
        ];
    }
    public function messages()
    {
        return [
            'phone.required'=>'Số điện thoại không được để trống !',
            'phone.min'=>'Số điện thoại thiếu số !',
            'phone.max'=>'Số điện thoại bị thừa số !',
            'password.required'=>'Mật khẩu không được để trống !',
            'password.min'=>'Mật khẩu phải lớn hơn 8 kí tự !'
        ];
    }
}
