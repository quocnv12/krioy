<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
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
            'emailreset' =>'required|email',
        ];
    }
    public function messages()
    {
        if (\Lang::locale() == 'en') {
            return [
                'emailreset.required' => 'Please Enter Your Email !',
                'emailreset.email' => 'Email is in wrong format !',
            ];
        }
        if (\Lang::locale() == 'vi') {
            return [
                'emailreset.required' => 'Email không được để trống !',
                'emailreset.email' => 'Email sai định dạng !',
            ];
        }
    }
}
