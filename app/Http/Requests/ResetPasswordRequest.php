<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'password' =>'required|min:8|max:30',
            'password_confirmation'=>'required|same:password'
        ];
    }
    public function messages()
    {
        if (\Lang::locale() == 'en') {
            return [
                'password.required'=>'Pleasea enter password !',
                'password_confirmation.same' => 'Password entered does not match !',
                'password_confirmation.required' => 'Pleasea enter password comfirmation !',
                'password.max'=>'Password from 8 to 30 characters !',
                'password.max'=>'Password from 8 to 30 characters !',
            ];
        }
        if (\Lang::locale() == 'vi') {
            return [
                'password.required'=>'Mật khẩu không được để trống !',
                'password_confirmation.same' => 'Nhập lại mật khẩu không chính xác !',
                'password_confirmation.required' => 'Nhập lại mật khẩu không được để trống !',
                'password.min'=>'Mật khẩu tối thiếu 8 kí tự !',
                'password.max'=>'Mật khẩu tối đa 30 kí tự !'
            ];
        }
    }
}
