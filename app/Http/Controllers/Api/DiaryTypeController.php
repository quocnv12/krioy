<?php

namespace App\Http\Controllers\Api;

use App\models\DiaryType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DiaryTypeController extends Controller
{

    public function index()
    {
        $diary_types = DiaryType::all();
        return response()->json([
            'diary_types'=>$diary_types
        ], 200);
    }


    public function create()
    {
        return response()->json(null, 204);
    }


    public function store(Request $request)
    {
        $validation_vi = [
            'name.required' => 'Vui lòng nhập tên loại nhật ký !',
            'name.unique' => 'Tên loại nhật ký đã tồn tại !'
        ];

        $validation_en = [
            'name.required' => 'Please input name !',
            'name.unique' => 'Diary type already exist !'
        ];

        $validate = Validator::make($request->all(),[
                'name' =>'required|unique:diary_types,name'
            ],app()->getLocale() == 'vi' ? $validation_vi : $validation_en);

        if($validate->fails())
        {
            return response()->json([
                'errors' => $validate->errors(),
                'status' => 400
            ],200);
        }

        $diary_types = DiaryType::create($request->all());
        $diary_types->save();

        return response()->json([
            'diary_types'=>$diary_types
        ], 201);
    }

    public function edit($id)
    {
        $diary_types = DiaryType::find($id);
        return response()->json([
            'diary_types'=>$diary_types
        ], 201);
    }


    public function update(Request $request, $id)
    {
        $validation_vi = [
            'name.required' => 'Vui lòng nhập tên loại nhật ký !',
            'name.unique' => 'Tên loại nhật ký đã tồn tại !'
        ];

        $validation_en = [
            'name.required' => 'Please input name !',
            'name.unique' => 'Diary type already exist !'
        ];
        $validate = Validator::make($request->all(),
            [
                'name' => 'required|unique:diary_types,name,' . $id
            ],app()->getLocale() == 'vi' ? $validation_vi : $validation_en);

        if($validate->fails())
        {
            return response()->json([
                'errors' => $validate->errors(),
                'status' => 400
            ],200);
        }

        $diary_types = DiaryType::find($id);
        $diary_types->update($request->all());
        $diary_types->save();

        return response()->json([
            'diary_types'=>$diary_types
        ], 200);
    }


    public function destroy($id)
    {
        $diary_types= DiaryType::find($id);
        if (! $diary_types){
            return response()->json(['message'=>'Something wrong'], 404);
        }else{
            $diary_types->delete();
            return response()->json(null, 204);
        }
    }
}
