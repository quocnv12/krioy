<?php

namespace App\Http\Controllers\Admin;

use App\models\ObservationModel;
use App\models\ObservationTypeModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ObservationTypeController extends Controller
{
    public function getAdd()
    {
        return view('pages.observationType.add');
    }
    public function postAdd(Request $request)
    {
        $validation_vi = [
            'name.required' => 'Vui lòng nhập tên loại đánh giá !',
            'name.unique' => 'Tên loại đánh giá đã tồn tại !'
        ];

        $validation_en = [
            'name.required' => 'Please input name !',
            'name.unique' => 'Observation type already exist !'
        ];

        $this->validate($request,
            [
                'name' =>'required|unique:observations_type,name'
            ],app()->getLocale() == 'vi' ? $validation_vi : $validation_en);

        $observationtype = new ObservationTypeModel;
        $observationtype->name = $request->name;
        $observationtype->save();
        return redirect()->back()->with('success', app()->getLocale() == 'vi' ? 'Thêm Thành Công !' : 'Added Successfully !');
    }

    public function getEdit($id){
        $observationtype = ObservationTypeModel::find($id);
        return view('pages.observationType.edit', compact('observationtype'));
    }
    public  function postEdit(Request $request, $id)
    {
        $validation_vi = [
            'name.required' => 'Vui lòng nhập tên loại đánh giá !',
            'name.unique' => 'Tên loại đánh giá đã tồn tại !'
        ];

        $validation_en = [
            'name.required' => 'Please input name !',
            'name.unique' => 'Observation type already exist !'
        ];
        $this->validate($request,
            [
                'name' => 'required|unique:observations_type,name,' . $id
            ],app()->getLocale() == 'vi' ? $validation_vi : $validation_en);
        $observationtype = ObservationTypeModel::find($id);
        $observationtype->name = $request->name;
        $observationtype->save();
        return redirect()->back()->with('success',app()->getLocale() == 'vi' ? 'Cập Nhật Thành Công !' : 'Updated Successfully !');
    }

    public function getDelete($id){
        $observationtype= ObservationModel::find($id);
        if (! $observationtype){
            return view('pages.not-found.notfound');
        }

        $observationtype->delete();

        return redirect(route('admin.observations.listobservationtype'))->with('success',app()->getLocale() == 'vi' ? 'Xóa Thành Công !' : 'Deleted Successfully !');
    }
}
