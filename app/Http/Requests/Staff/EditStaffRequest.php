<?php

namespace App\Http\Requests\Staff;

use Illuminate\Foundation\Http\FormRequest;

class EditStaffRequest extends FormRequest
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
            'first_name'         =>'required',
            'last_name'          =>'required',
            'phone'              =>'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|size:10|unique:staff_profiles,phone,'.$this->id.'id',
            'gender'             =>'required',
            'email'              =>'required|email|unique:staff_profiles,email,'.$this->id.'id',
            'address'            =>'required',
            'date_birthday'      =>'required|date',
           // 'blood_group'        =>'required',
            'date_of_joining'    =>'required|date',
        ];
    }
    public function messages()
    {
        if (\Lang::locale() == 'en') {
            return [
                'image.image'               => 'Image is in wrong format !',
                'first_name.required'       => 'Please enter first_name !',
                'last_name.required'        => 'Please enter last_name !',
                'phone.required'            => 'Please enter number phone !',
                'phone.regex'               => 'Phone numbers start with 0 !',
                'phone.not_regex'           => 'Phone numbers must be numeric !',
                'phone.size'                => 'Phone number includes 10 numbers !',
                'phone.unique'              => 'Number phone already exist !',
                'email.required'            => 'Please enter email !',
                'email.email'               => 'Email is in wrong format !',
                'email.unique'              => 'Email already exist !',
                'address.required'          => 'Please enter address !',
                'date_birthday.required'    => 'Please enter date_birthday !',
                'date_birthday.date'        => 'Date_birthday is in wrong format !',
                'date_birthday.before'        => 'Date_birthday is invalid !',
            // 'blood_group.required'      => 'Please choose blood_group !',
                'date_of_joining.required'  => 'Please choose date_of_joining !',
                'date_of_joining.date'      => 'Date_of_joining is in wrong format !',
                'gender.required'           => 'Please choose gender !',
            ];
        }
        if (\Lang::locale() == 'vi') {
            return [
                'image.image'               => 'Hình ảnh sai định dạng !',
                'first_name.required'       => 'Trường này không được để trống !',
                'last_name.required'        => 'Trường này không được để trống  !',
                'phone.required'            => 'Số điện thoại không được để trống !',
                'phone.regex'               => 'Sô điện thoại bắt đầu bằng số 0 !',
                'phone.not_regex'           => 'Số điện thoại phải là kiểu số !',
                'phone.size'                => 'Số điện thoại gồm 10 số !',
                'phone.unique'              => 'Số điện thoại đã tồn tại !',
                'email.required'            => 'Email không được để trống !',
                'email.email'               => 'Email sai định dạng !',
                'email.unique'              => 'Email đã tồn tại !',
                'address.required'          => 'Địa chỉ không được để trống !',
                'date_birthday.required'    => 'Ngày sinh không được để trống !',
                'date_birthday.date'        => 'Ngày sinh sai định dạng !',
                'date_birthday.before'      => 'Ngày sinh không hợp lệ !',
            // 'blood_group.required'      => 'Please choose blood_group !',
                'date_of_joining.required'  => 'Ngày vào làm không được để trống !',
                'date_of_joining.date'      => 'Ngày vào làm sai định dạng !',
                'gender.required'           => 'Giới tính không được để trống !',
            ];
        }
    }
}
