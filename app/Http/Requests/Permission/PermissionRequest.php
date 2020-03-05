<?php

namespace App\Http\Requests\Permission;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'role'   =>  'required|unique:roles,name'
        ];
    }
    public function messages()
    {
        if (\Lang::locale() == 'en') {
            return [
                'role.required'   =>  'Please enter role !',
                'role.unique'     => 'Role already exist !',
            ];
        }
        if (\Lang::locale() == 'vi') {
            return [
                'role.required'   =>  'Không được để trống trường này !',
                'role.unique'     => 'Quyền này đã tồn tại !',
            ];
        }
    }
}
