<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHeathRequests extends FormRequest
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
            "sick"=>"required|min:2|max:255",
            "growth_height"=>"required|min:2",
            "growth_weight"=>"required|min:2",
            "medicine"=>"required|min:2|max:255",
            "blood_group"=>"required|min:2|max:255",
            'image' =>($this->id ? 'nullable' : 'required'). 'image',

        ];
    }
    public  function messages()
    {
        return[
            'required' => ":attribute không được để trống",
            'min'=>':attribute tối thiếu có 2-255 kí tự',
            'max'=>':attribute tối thiếu có 2-255 kí tự',
            'numeric' => ":attribute phải là số thực",
            'image' => ":attribute phải là hình ảnh",
        ];
    }
    public function attributes()
    {
        return[
            'text'=>'mô tả sức khỏe ',
            'growth_height'=>'chỉ số chiều cao',
            'growth_weight'=>'chỉ số cân nặng',
            'medicine'=>'tên thuốc',
            'image' =>'ảnh đại diện',
        ];

    }
}
