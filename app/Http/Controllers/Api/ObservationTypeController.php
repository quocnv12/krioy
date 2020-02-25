<?php

namespace App\Http\Controllers\Api;

use App\models\ObservationTypeModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;

class ObservationTypeController extends Controller
{


    public function getAdd(){
        $observationtype = ObservationTypeModel::all();
        return response()->json([
            'observationtype'=>$observationtype
        ], 200);
    }
    public function postAdd(Request $request)
    {
        $validation_vi = [
            'name.required' => 'Vui lòng nhập tên loại đánh giá !',
            'name.unique' => 'Tên laoij đánh giá đã tồn tại !'
        ];

        $validation_en = [
            'name.required' => 'Please input name !',
            'name.unique' => 'Observation type already exist !'
        ];

        $validate = Validator::make($request->all(),
            [
                'name' => 'required|unique:observations_type,name,'
            ], app()->getLocale() == 'vi' ? $validation_vi : $validation_en);
        if($validate->fails())
        {
            return response()->json([
                'errors' => $validate->errors(),
                'status' => 400
            ],200);
        }

        $observationtype = new ObservationTypeModel;
        $observationtype->name = $request->name;
        $observationtype->save();
        return response()->json([
            'observationtype'=>$observationtype
        ], 201);
    }
    public function getEdit($id){
        $observationtype = ObservationTypeModel::find($id);
        return response()->json([
            'observationtype'=>$observationtype
        ], 202);
    }
    public  function postEdit(Request $request, $id)
    {
        $validation_vi = [
            'name.required' => 'Vui lòng nhập tên loại đánh giá !',
            'name.unique' => 'Tên laoij đánh giá đã tồn tại !'
        ];

        $validation_en = [
            'name.required' => 'Please input name !',
            'name.unique' => 'Observation type already exist !'
        ];

        $validate = Validator::make($request->all(),
            [
                'name' => 'required|unique:observations_type,name,' . $id
            ],app()->getLocale() == 'vi' ? $validation_vi : $validation_en);
        if($validate->fails())
        {
            return response()->json([
                'errors' => $validate->errors(),
                'status' => 400
            ],200);
        }
        $observationtype = ObservationTypeModel::find($id);
        $observationtype->name = $request->name;
        $observationtype->save();
        return response()->json([
            'observationtype'=>$observationtype
        ], 200);
    }
    public function getDelete($id){
        $observationtype= DB::table('observations_type')->where('id',$id)->delete();
        return response()->json([
            'observationtype'=>$observationtype
        ], 204);
    }
}
