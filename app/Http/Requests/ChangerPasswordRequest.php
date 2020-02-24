<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangerPasswordRequest extends FormRequest
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
            'password_old'=>'required',
            'password'=>'required|min:8|max30',
            'password_confirmation'=>'required|same:password'
        ];
    }
    public function messages()
    {
        if (\Lang::locale() == 'en') {
            return [
                'password_old.required'=>'Please enter password old !',
                'password.required'=>'Please enter password new !',
                'password.min'=>'Password from 8 to 30 characters !',
                'password.max'=>'Password from 8 to 30 characters !',
                'password_confirmation.required'=>'Please enter confirm password new !',
                'password_confirmation.same'=>'Password entered does not match !'
            ];
        }
        if (\Lang::locale() == 'vi') {
            return [
                'password_old.required'=>'Mật khẩu cũ không được để trống !',
                'password.required'=>'Mật khẩu mới không được để trống !',
                'password.min'=>'Mật khẩu tối thiếu 8 kí tự !',
                'password.max'=>'Mật khẩu tối đa 30 kí tự !',
                'password_confirmation.required'=>'Nhập lại mật khẩu không được để trống !',
                'password_confirmation.same'=>'Mật khẩu không trùng !'
            ];
        }
       
    }
}
