<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DemoAccountRequest extends FormRequest
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
            'first_name' =>'required',
            'email' =>'required|email|unique:staff_profiles,email',
            'phone'=>'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|size:10|unique:staff_profiles,phone',
            'password'=>'required|min:8|max:30'
        ];
    }
    public function messages()
    {
        return [
            'first_name.required'=>'Please enter first_name !',
            'email.required'=>'Please enter email !',
            'email.email'=>'Malformed email !',
            'email.unique'  => 'Email already exist !',
            'phone.required'=>'Please enter phone !',
            'phone.regex'=>'Phone numbers start with 0 !',
            'phone.not_regex'=>'Phone numbers must be numeric !',
            'phone.size'=>'Phone number includes 10 numbers !',
            'phone.unique'=>'Phone already exist !',
            'password.required'=>'Please enter password !',
            'password.min'=>'Password from 8 to 30 characters !',
            'password.max'=>'Password from 8 to 30 characters !'
        ];
    }
}
