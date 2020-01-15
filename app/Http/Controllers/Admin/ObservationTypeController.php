<?php

namespace App\Http\Controllers\Admin;

use App\models\ObservationTypeModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ObservationTypeController extends Controller
{
    public function getDelete($id){
        $observationtype= DB::table('observations_type')->where('id',$id)->delete();
        return redirect()->route('admin.observations.listobservationtype', compact('observationtype'));
    }
    public function getEdit($id){
        $observationtype = ObservationTypeModel::find($id);
        return view('pages.observationType.edit', compact('observationtype'));
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
        return redirect('kids-now/observations/danhsachobservationtype');
    }
    public function getAdd()
    {
        return view('pages.observationType.add');
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
        return redirect('kids-now/observations/danhsachobservationtype');


    }

}
