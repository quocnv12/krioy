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
            'phone'=>'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|size:10',
            'password'=>'required|min:8|max:30'
        ];
    }
    public function messages()
    {
        if (\Lang::locale() == 'en') {
            return [
                'phone.required'=>'Please enter phone !',
                'phone.regex'=>'Phone numbers start with 0 !',
                'phone.not_regex'=>'Phone numbers must be numeric !',
                'phone.size'=>'Phone number includes 10 numbers !',
                'password.required'=>'Please enter password !',
                'password.min'=>'Password from 8 to 30 characters !',
                'password.max'=>'Password from 8 to 30 characters !'
            ];
        }
        if (\Lang::locale() == 'vi') {
            return [
                'phone.required'=>'Số điện thoại không được để trống !',
                'phone.regex'=>'Số điện thoại bắt đầu bằng số 0 !',
                'phone.not_regex'=>'Số điện thoại phải là kiểu số !',
                'phone.size'=>'Số điện thoại gồm 10 số !',
                'password.required'=>'Mật khẩu không được để trống !',
                'password.min'=>'Mật khẩu tối thiếu 8 kí tự !',
                'password.max'=>'Mật khẩu tối đa 30 kí tự !'
            ];
        }
    }
}
