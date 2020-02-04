<?php

namespace App\Http\Controllers\Api;

use App\models\ObservationTypeModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
        $this->validate($request,
            [
                'name' =>'required|unique:observations_type,name'
            ],
            [
                'name.required' => 'Please input name !',
                'name.unique' => 'Meal type already exist !'

            ]);

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
        ], 201);
    }
    public  function postEdit(Request $request, $id)
    {
        $this->validate($request,
            [
                'name' => 'required|unique:observations_type,name,' . $id
            ],
            [
                'name.required' => 'Please input name !',
                'name.unique' => 'Meal type already exist !'
            ]);
        $observationtype = ObservationTypeModel::find($id);
        $observationtype->name = $request->name;
        $observationtype->save();
        return response()->json([
            'observationtype'=>$observationtype
        ], 201);
    }
    public function getDelete($id){
        $observationtype= DB::table('observations_type')->where('id',$id)->delete();
        return response()->json([
            'observationtype'=>$observationtype
        ], 204);
    }
}
