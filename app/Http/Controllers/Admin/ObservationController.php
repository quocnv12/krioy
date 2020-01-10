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
    public function getAdd(){
        $observationtype = ObservationModel::all();
        return view('pages.observation.observation', compact('observationtype'));
    }
    public function getDelete($id){
        $observationtype= DB::table('observations')->where('id',$id)->delete();
        return redirect()->route('admin.observations.list', compact('observationtype'))->with(['flash_level'=>'success','flash_message'=>'Del tin tuyển dụng thành công!!!']);
    }

    public function getEdit($id)
    {
       $vendors = ObservationTypeModel::all();
        $childrent =DB::table('children_profiles')->where('id',$id)->first();

        $observationtype = DB::table('observations')->where('id',$id)->first();

        return view('pages.observation.sua',compact('observationtype','vendors','childrent'));
    }
    public function postEdit(Request $request, $id){
        $vendors = ObservationTypeModel::all();
        $observationtype = ObservationTypeModel::find($id);
        $childrent = ChildrenProfiles::find($id);
        $childrent->first_name = $request->first_name;
        $childrent->last_name = $request->last_name;
        $childrent->birthday = $request->birthday;
        $childrent->gender = $request->gender;
//        $observationtype->name = $request->id;
//        $observationtype->save();
        $childrent->save();
        return view('pages.observation.sua',compact('observationtype','childrent','vendors'));
    }
    public function getSearch(Request $req){




        $search = DB::table('observations')
           ->join('children_profiles','children_profiles.id','=','observations.id_children')
           ->join('observations_type','observations_type.id','=','observations.id_observations')
           ->select('observations.*','children_profiles.*','observations_type.name')
           ->where('first_name','like','%'.$req->key.'%')
            ->orWhere('last_name','like','%'.$req->key.'%')
           ->orWhere('birthday','like','%'.$req->key.'%')
           ->orWhere('gender','like','%'.$req->key.'%')
            ->orWhere('name','like','%'.$req->key.'%')->get();
       return view('pages.observation.search',compact('search'));


    }
    public function postSearch(Request $req){
        $search = DB::table('observations')
            ->join('children_profiles','children_profiles.id','=','observations.id_children')
            ->join('observations_type','observations_type.id','=','observations.id_observations')
            ->select('observations.*','children_profiles.first_name','children_profiles.last_name','children_profiles.birthday','children_profiles.gender','observations_type.name')
            ->where('first_name','like','%'.$req->key.'%')
            ->orWhere('last_name','like','%'.$req->key.'%')
            ->orWhere('birthday','like','%'.$req->key.'%')
            ->orWhere('gender','like','%'.$req->key.'%')
            ->orWhere('name','like','%'.$req->key.'%')->get();
        return view('pages.observation.search',compact('search'));


    }


}
