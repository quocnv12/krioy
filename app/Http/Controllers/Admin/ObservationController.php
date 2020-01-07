<?php

namespace App\Http\Controllers\Admin;
use App\models\ChildrenProfiles;
use App\models\ObservationModel;
use App\Http\Controllers\Controller;
use App\models\ObservationTypeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ObservationController extends Controller
{
    public function getList(){
        $observationtype= ObservationModel::paginate(5);
        return view('pages.observation.list', compact('observationtype'));
    }
    public function getDelete($id){
        $observationtype= DB::table('observations')->where('id',$id)->delete();
        return redirect()->route('admin.observations.list', compact('observationtype'))->with(['flash_level'=>'success','flash_message'=>'Del tin tuyển dụng thành công!!!']);
    }

    public function getEdit($id)
    {
        $vendors = DB::table('observations_type')->get();
        foreach ($vendors as $key => $val) {
            $vendor[] = ['id' => $val->id, 'name'=> $val->name];
        }
        $childrent =DB::table('children_profiles')->where('id',$id)->first();

        $observationtype = DB::table('observations')->where('id',$id)->first();

        return view('pages.observation.sua',compact('observationtype','vendors','childrent'));
    }
    public function postEdit(Request $request, $id){
        $observationtype = ObservationModel::find($id);
        $childrent = ChildrenProfiles::find($id);
        $childrent->first_name = $request->first_name;
        $childrent->last_name = $request->last_name;
        $childrent->birthday = $request->birthday;
        $childrent->gender = $request->gender;
        $observationtype->id_observations = $request->id_observations;
        $observationtype->save();
        $childrent->save();
        return view('pages.observation.sua',compact('observationtype','childrent'));
    }
    public function getSearch(Request $req){
        $search = DB::table('observations as a')
            ->where('first_name','like','%'.$req->key.'%')
            ->where('last_name','like','%'.$req->key.'%')
            ->where('birthday','like','%'.$req->key.'%')
            ->where('gender','like','%'.$req->key.'%')
            ->where('name','like','%'.$req->key.'%')
            ->join('observations_type as b','a.id_observations','=','b.id')
            ->join('children_profiles as c','a.id_children','=','c.id')
            ->select('a.*','b.*','c.*')
            ->paginate(5);
        return view('pages.observation.search',compact('search'));





    }
    public function postSearch(Request $req){
        $search = DB::table('observations as a')
            ->where('first_name','like','%'.$req->key.'%')
            ->where('last_name','like','%'.$req->key.'%')
            ->where('birthday','like','%'.$req->key.'%')
            ->where('gender','like','%'.$req->key.'%')
            ->where('name','like','%'.$req->key.'%')
            ->join('observations_type as b','b.id','=','a.id_observations')
            ->join('children_profiles as c','c.id','=','a.id_children')
            ->select('a.*','b.*','c.*')
            ->paginate(5);
        return view('pages.observation.search',compact('search'));

    }


}
