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
            'phone'=>'required|numeric|min:10',
            'password'=>'required|min:8'
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
            'phone.numeric'=>'Phone numbers must be numeric !',
            'phone.min'=>'Phone must be greater than 10 characters !',
            'password.required'=>'Please enter password !',
            'password.min'=>'Password must be greater than 8 characters !'
        ];
    }
}
