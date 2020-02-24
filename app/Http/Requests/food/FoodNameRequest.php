<?php

namespace App\Http\Requests\food;

use Illuminate\Foundation\Http\FormRequest;

class FoodNameRequest extends FormRequest
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
            'food_name' => 'required|unique:food_items,food_name'
        ];
    }
    public function messages()
    {
        if (\Lang::locale() == 'en') {
            return [
                'food_name.required' => 'Please input food name !',
                'food_name.unique' => 'Food name already exist !'
            ];
        }
        if (\Lang::locale() == 'vi') {
            return [
                'food_name.required' => 'Tên món ăn không được để trống !',
                'food_name.unique' => 'Tên món ăn đã tồn tại !'
            ];
        }
    }
}
