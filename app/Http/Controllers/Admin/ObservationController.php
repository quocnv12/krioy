<?php

namespace App\Http\Controllers\Admin;
use App\models\ChildrenProfiles;
use App\models\ObservationModel;
use App\Http\Controllers\Controller;
use App\models\ObservationTypeModel;
use App\models\Programs;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ObservationController extends Controller
{
    public function getList(Request $request){
        if ($request->month || $request->year) {
            $child_observations = ObservationModel::where('month', '=', $request->month)->where('year', '=', $request->year)->get();
            return view('pages.observation.list', compact('child_observations'));
        }else {
            $current_month = Carbon::now()->format('M');
            $child_observations = ObservationModel::where('month', '=', $current_month)->where('year', '=', now()->year)->get();
            return view('pages.observation.list', compact('child_observations'));
        }
    }

    public function getChild(){
        $observationtype = ChildrenProfiles::all();
        return view('pages.observation.select_child', compact('observationtype'));
    }
    public  function getListObservation(){
        $observationtype = ObservationTypeModel::all();
        return view('pages.observation.listobservationType', compact('observationtype'));
    }

    public function getAdd(){
        $observationtype = ObservationTypeModel::all();
        $programs = Programs::all();
        return view('pages.observation.add', compact('observationtype','programs'));
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'observations'          =>  'required',
                'children_observations' =>  'required',
                'detailObservation'     =>  'nullable',
            ],
            [
                'observations.required'         =>  'Please choose observations',
                'children_observations.required'=>  'Please choose children',
            ]);


        //string to array
        $children_observations = explode(',', $request->children_observations);
        //luu vao bang observations
        foreach ($children_observations as $children_id) {
            $check_id_children_isset = ObservationModel::where('id_children','=',$children_id)->get();
            $observer = Auth::user()->first_name.' '.Auth::user()->last_name;

            //array chua month da ton tai
            $array_month = [];
            foreach ($check_id_children_isset as $collection)
            {
                if (! in_array($collection->month, $array_month)){
                    array_push($array_month, $collection->month);
                }
            }
            //dd($array_month);

            //array chua year da ton tai
            $array_year = [];
            foreach ($check_id_children_isset as $collection)
            {
                if (! in_array($collection->year, $array_year)) {
                    array_push($array_year, $collection->year);
                }
            }

            //array chua observer da ton tai
            $array_observer = [];
            foreach ($check_id_children_isset as $collection)
            {
                if (! in_array($collection->observer, $array_observer)) {
                    array_push($array_observer, $collection->observer);
                }
            }

            if (isset($check_id_children_isset)) {
                if ((in_array($request->month, $array_month)) && (in_array($request->year, $array_year))){
                    if (in_array($observer, $array_observer)){
                        $child_observation = ObservationModel::where('id_children','=',$children_id)->where('month','=',$request->month)->where('year','=',$request->year)->where('observer','=',$observer)->first();
                        $child_observation->id_observations = $request->observations;
                        $child_observation->detailObservation = $request->detailObservation;
                        $child_observation->month = $request->month;
                        $child_observation->year = $request->year;
                        $child_observation->save();
                    }else{
                        $child_observation = new ObservationModel();
                        $child_observation->id_children = $children_id;
                        $child_observation->id_observations = $request->observations;
                        $child_observation->detailObservation = $request->detailObservation;
                        $child_observation->month = $request->month;
                        $child_observation->year = $request->year;
                        $child_observation->observer = $observer;
                        $child_observation->save();
                    }
                }else{
                    $child_observation = new ObservationModel();
                    $child_observation->id_children = $children_id;
                    $child_observation->id_observations = $request->observations;
                    $child_observation->detailObservation = $request->detailObservation;
                    $child_observation->month = $request->month;
                    $child_observation->year = $request->year;
                    $child_observation->observer = $observer;
                    $child_observation->save();
                }
            }else{
                $child_observation = new ObservationModel();
                $child_observation->id_children = $children_id;
                $child_observation->id_observations = $request->observations;
                $child_observation->detailObservation = $request->detailObservation;
                $child_observation->month = $request->month;
                $child_observation->year = $request->year;
                $child_observation->observer = $observer;
                $child_observation->save();
            }
        }
        return redirect()->back()->with('notify','Add successfully');
    }

    public function getEdit($id)
    {
        $vendors = ObservationTypeModel::all();
        $observationtype = ObservationTypeModel::all();
        $child_observation = ObservationModel::find($id);
        $children_profiles = ChildrenProfiles::where('id','=',$child_observation->id_children)->first();
        $array_observation_choose = explode(',',$child_observation->id_observations);

        return view('pages.observation.edit',compact('observationtype','vendors','children_profiles','array_observation_choose','child_observation'));
    }
    public function postEdit(Request $request, $id){
        $this->validate($request,
            [
                'detailObservation'     =>  'nullable',
            ]);

        $child_observation = ObservationModel::find($id);
        $child_observation->id_observations = $request->observation_new;
        $child_observation->detailObservation = $request->detailObservation;
        $child_observation->save();
        return redirect()->back()->with('notify','Edit successfully');
    }

    public function getDelete($id){
        $observation= DB::table('observations')->where('id',$id)->delete();
        return redirect()->back()->with('notify_clipboard','Deleted file successfully');
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

//    public function addSelectChild(Request $request)
//    {
//        if ($request->ajax()) {
//            $output = '';
//            $children_profiles = ChildrenProfiles::find($request->id_children);
//
//            if ($children_profiles){
//                $output = '
//                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 ng-star-inserted select-child-img select-child-img1" style="">
//							    <div class="child-class" style="height: 120px;text-align: center;">
//							        <div class="image">
//                                        <img class="img-circle" onerror="this.src=\'images/Child.png\';" style="height: 80px" width="80" src="' . $children_profiles->image . '">
//                                        <input type="hidden" value="' . $children_profiles->id . '">
//                                        <button class="btn btn-xs btn-danger" type="button" onclick="deleteChild(' . $children_profiles->id . ')">X</button>
//                                        <span class="limitText ng-star-inserted">' . $children_profiles->first_name . ' ' . $children_profiles->last_name . '</span>
//                                    </div>
//                                </div>
//                            </div>
//
//                            <script>
//                                $(\'.btn-danger\').click(function() {
//                                  $(this).parent(\'div\').parent(\'div\').parent(\'div\').hide();
//                                })
//                            </script>
//                            ';
//            }
//            return Response($output);
//        }
//    }

    public function showChildrenInProgram($id){
        $observationtype = ObservationTypeModel::all();
        $programs = Programs::all();
        $children_profiles = DB::table('children_profiles')
                            ->join('children_programs','children_profiles.id','=','children_programs.id_children')
                            ->where('children_programs.id_program','=',$id)
                            ->get();
        return view('pages.observation.add',['children_profiles'=>$children_profiles,
                                                    'observationtype'=>$observationtype,
                                                    'programs'=>$programs]);
    }

    public function view($id){
        $vendors = ObservationTypeModel::all();
        $observationtype = ObservationTypeModel::all();
        $child_observation = ObservationModel::find($id);
        $children_profiles = ChildrenProfiles::where('id','=',$child_observation->id_children)->first();
        $array_observation_choose = explode(',',$child_observation->id_observations);

        return view('pages.observation.view',compact('observationtype','vendors','children_profiles','array_observation_choose','child_observation'));

    }

}
