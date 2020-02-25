<?php

namespace App\Http\Requests\food;

use Illuminate\Foundation\Http\FormRequest;

class EditQuantityRequest extends FormRequest
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
            'name' => 'required|unique:quantity_food,name,'.$this.'id'
        ];
    }
    public function messages()
    {
        if (\Lang::locale() == 'en') {
            return [
                'name.required' => 'Please input name !',
                'name.unique' => 'Quantity already exist !'
            ];
        }
        if (\Lang::locale() == 'vi') {
            return [
                'name.required' => 'Số lượng bữa ăn không được để trống !',
                'name.unique' => 'Số lượng bữa ăn đã tồn tại !'
            ];
        }
    }
}
