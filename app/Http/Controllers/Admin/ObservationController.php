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

    public function getChild(){
        $observationtype = ChildrenProfiles::all();
        return view('pages.observation.select_child', compact('observationtype'));
    }

    public function getAdd(){
        $observationtype = ObservationTypeModel::all();
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
        //$observationtype->name = $request->id;
        //$observationtype->save();
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

    public function searchByName(Request $request)
    {
        $children_profiles = ChildrenProfiles::where('first_name', 'like', '%' . $request->get('q') . '%')
            ->orWhere('last_name', 'like', '%' . $request->get('q') . '%')
            ->orderBy('last_name')
            ->get();
        return response()->json($children_profiles);
    }

    public function addSelectChild(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $children_profiles = ChildrenProfiles::find($request->id_children);

            if ($children_profiles){
                $output = '
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 ng-star-inserted select-child-img select-child-img1" style="">
							    <div class="child-class" style="height: 120px;text-align: center;">
							        <div class="image">
                                        <img class="img-circle" onerror="this.src=\'images/Child.png\';" style="height: 80px" width="80" src="' . $children_profiles->image . '">
                                        <input type="hidden" value="' . $children_profiles->id . '">
                                        <button class="btn btn-xs btn-danger" type="button" onclick="deleteChild(' . $children_profiles->id . ')">X</button>
                                        <span class="limitText ng-star-inserted">' . $children_profiles->first_name . ' ' . $children_profiles->last_name . '</span>
                                    </div>
                                </div>
                            </div>
                            
                            <script>
                                $(\'.btn-danger\').click(function() {
                                  $(this).parent(\'div\').parent(\'div\').parent(\'div\').hide();
                                })
                            </script>
                            ';
            }
            return Response($output);
        }
    }
}
