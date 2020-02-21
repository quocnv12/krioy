<?php

namespace App\Http\Controllers\Api;
use App\models\staff\role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class PermissionController extends Controller
{
    public function index()
    {
        $permission = role::all();
        return response()->json([
            'permission' => $permission
        ],200);
    }
    public function show($id)
    {
        $permission = role::find($id);
        if(!$permission)
        {
            return response()->json(['massage' => 'Record not found!'] , 404);
        }
        $permission = role::find($id);
        return response()->json(['permission' => $permission], 200);
    }
    // thêm role
    public function store(Request $request)
    {
        $rules =  
            [
                'name'  => 'required',
            ];
        $validator = Validator::make($request->all(), $rules,[
            'name.required'  => 'Please enter permission !',
        ]);
        if($validator->fails())
            {
                return response()->json($validator->errors(), 400);
            }
        $permission = role::create($request->all());
        $permission->save();
        return response()->json(['massage' => 'Add permission success !'], 201);
    }

    public function update(Request $request,$id)
    {
        $permission = role::find($id);
        if(!$permission)
        {
            return response()->json(['massage' => 'Record not found !'] , 404);
        }
        $rules =  
            [
                'name'  => 'required',
            ];
        $validator = Validator::make($request->all(), $rules,[
            'name.required'  => 'Please enter permission !',
        ]);
        if($validator->fails())
            {
                return response()->json($validator->errors(), 400);
            }
        $permission->update($request->all());
        $permission->save();
        return response()->json(['massage' => 'Edit permission success !'], 201);
    }

}
