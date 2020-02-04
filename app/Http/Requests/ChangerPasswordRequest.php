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
            'password'=>'required|min:8',
            'password_confirmation'=>'required|same:password'
        ];
    }
    public function messages()
    {
        return [
            'password_old.required'=>'Please enter password old !',
            'password.required'=>'Please enter password new !',
            'password.min'=>'Password must be greater than 8 characters !',
            'password_confirmation.required'=>'Please enter confirm password new !',
            'password_confirmation.same'=>'Password entered does not match !'
        ];
    }
}
