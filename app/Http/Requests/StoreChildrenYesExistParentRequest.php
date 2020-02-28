<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChildrenYesExistParentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required|before:today|after:01-01-2010',
            'gender' => 'nullable',
            'date_of_joining' => 'nullable',
            'unique_id' => 'required|unique:children_profiles,unique_id',
            'address' => 'nullable',
            'allergies' => 'nullable',
            'additional_note' => 'nullable',
            'image' => 'image|nullable',
            'status' => 'nullable',
            'exist' => 'nullable',

            'first_name_parent' => 'required',
            'last_name_parent' => 'required',
            'main_phone_parent' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|size:10',
            'extra_phone_parent' => 'nullable|regex:/(0)[0-9]/|not_regex:/[a-z]/|size:10',
            'email_parent' => 'required|email',
            'gender_parent' => 'nullable',
            'note_parent' => 'nullable',
            'image_parent' => 'image|nullable',
        ];
    }

    public function messages()
    {
        if (app()->getLocale() == 'vi'){
            return [
                'first_name.required' => 'Trường này không được để trống',
                'last_name.required' => 'Trường này không được để trống',
                'image.image' => 'Ảnh không hợp lệ',
                'birthday.required' => 'Ngày sinh không được để trống',
                'birthday.before' => 'Ngày sinh quá lớn',
                'birthday.after' => 'Ngày sinh quá nhỏ',
                'first_name_parent.required' => 'Trường này không được để trống',
                'last_name_parent.required' => 'Trường này không được để trống',
                'main_phone_parent.required' => 'Số điện thoại này không được để trống',
                'main_phone_parent.size' => 'Số điện thoại phải bao gồm 10 chữ số',
                'extra_phone_parent.size' => 'Số điện thoại phải bao gồm 10 chữ số',
                'main_phone_parent.regex' => 'Số điện thoại không hợp lệ',
                'extra_phone_parent.regex' => 'Số điện thoại không hợp lệ',
                'extra_phone_parent.different' => 'Số điện thoại dự phòng phải khác với số điện thoại chính',
                'email_parent.required' => 'Email không được để trống',
                'email_parent.email' => 'Email không hợp lệ',
                'unique_id.unique' => 'Mã ID đã tồn tại',
                'unique_id.required' => 'Mã ID không được để trống',
                'image_parent.image' => 'Ảnh không hợp lệ',
            ];
        }else{
            return [
                'first_name.required' => 'First Name is required',
                'last_name.required' => 'Last Name is required',
                'gender.required' => 'Gender is required',
                'image.image' => 'Image is invalid',
                'birthday.required' => 'Birthday is required',
                'date_of_joining.required' => 'Date of Joining is required',
                'first_name_parent.required' => 'First Name is required',
                'last_name_parent.required' => 'Last Name is required',
                'main_phone_parent.required' => 'The phone number is required',
                'main_phone_parent.size' => 'The phone number must has 10 digits',
                'extra_phone_parent.size' => 'The phone number must has 10 digits',
                'main_phone_parent.regex' => 'The main phone number is invalid',
                'extra_phone_parent.regex' => 'The extra phone number is invalid',
                'extra_phone_parent.different' => 'This phone must different from the main phone',
                'email_parent.required' => 'Email is required',
                'email_parent.email' => 'Email is invalid',
                'unique_id.unique' => 'ID is exist',
                'unique_id.required' => 'Unique ID is required',
                'image_parent.image' => 'Image is invalid',
            ];
        }
    }
}
