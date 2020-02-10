<?php

namespace App\Http\Controllers\Admin;
use App\models\ChildrenProfiles;
use App\models\ObservationModel;
use App\Http\Controllers\Controller;
use App\models\ObservationTypeModel;
use App\models\Programs;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


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
                        if ($request->hasFile('clip_board')){
                            $array_file = [];
                            foreach ($request->file('clip_board') as $file_name){
                                $uniqueFileName = (Str::random(4).'_'.$file_name->getClientOriginalName());
                                array_push($array_file, $uniqueFileName);
                                $file_name->move(storage_path('app/public/clip_board/') , $uniqueFileName);
                            }

                            $child_observation->clip_board = implode('/*endfile*/',$array_file);

                        }
                        $child_observation->save();
                    }else{
                        $child_observation = new ObservationModel();
                        $child_observation->id_children = $children_id;
                        $child_observation->id_observations = $request->observations;
                        $child_observation->detailObservation = $request->detailObservation;
                        $child_observation->month = $request->month;
                        $child_observation->year = $request->year;
                        $child_observation->observer = $observer;
                        if ($request->hasFile('clip_board')){
                            $array_file = [];
                            foreach ($request->file('clip_board') as $file_name){
                                $uniqueFileName = (Str::random(4).'_'.$file_name->getClientOriginalName());
                                array_push($array_file, $uniqueFileName);
                                $file_name->move(storage_path('app/public/clip_board/') , $uniqueFileName);
                            }

                            $child_observation->clip_board = implode('/*endfile*/',$array_file);

                        }
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
                    if ($request->hasFile('clip_board')){
                        $array_file = [];
                        foreach ($request->file('clip_board') as $file_name){
                            $uniqueFileName = (Str::random(4).'_'.$file_name->getClientOriginalName());
                            array_push($array_file, $uniqueFileName);
                            $file_name->move(storage_path('app/public/clip_board/') , $uniqueFileName);
                        }

                        $child_observation->clip_board = implode('/*endfile*/',$array_file);

                    }
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
                if ($request->hasFile('clip_board')){
                    $array_file = [];
                    foreach ($request->file('clip_board') as $file_name){
                        $uniqueFileName = (Str::random(4).'_'.$file_name->getClientOriginalName());
                        array_push($array_file, $uniqueFileName);
                        $file_name->move(storage_path('app/public/clip_board/') , $uniqueFileName);
                    }

                    $child_observation->clip_board = implode('/*endfile*/',$array_file);

                }
                $child_observation->save();
            }
        }
        return redirect()->back()->with('success','Added Observations');
    }

    public function getEdit($id)
    {
        $vendors = ObservationTypeModel::all();
        $observationtype = ObservationTypeModel::all();
        $child_observation  = ObservationModel::find($id);
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

        if ($request->hasFile('clip_board')){
            $old_array = explode('/*endfile*/',$child_observation->clip_board);
            foreach ($request->file('clip_board') as $file_name){
                $uniqueFileName = (Str::random(4).'_'.$file_name->getClientOriginalName());
                array_push($old_array, $uniqueFileName);
                $file_name->move(storage_path('app/public/clip_board/') , $uniqueFileName);
            }
            $child_observation->clip_board = implode('/*endfile*/',$old_array);
        }

        $child_observation->save();
        return redirect()->back()->with('success','Updated Observation');
    }

    public function getDelete($id){
        $observation = ObservationModel::findOrFail($id);

        if ($observation->clip_board){
            $old_array = explode('/*endfile*/',$observation->clip_board);
            foreach ($old_array as $key=>$value){
                $file_path = 'app/public/clip_board/'.$value;
                if ($file_path != 'app/public/clip_board/'){
                    unlink(storage_path($file_path));
                }
            }
        }
        $observation->delete();

        $current_month = Carbon::now()->format('M');
        $child_observations = ObservationModel::where('month', '=', $current_month)->where('year', '=', now()->year)->get();
        return view('pages.observation.list', compact('child_observations'))->with('success','Deleted Observation');
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
        $children_profiles = ChildrenProfiles::where(DB::raw("concat(first_name ,' ', last_name)"), 'like', '%' . $request->get('q') . '%')->get();

        return response()->json($children_profiles);
    }


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

    public function displayClipboard($id,$name)
    {
        return response()->file(storage_path('app/public/clip_board/'.$name),[
            'Content-Disposition' => 'inline; filename="'. $name .'"']);
    }

    public function deleteClipboard($id,$name)
    {
        $child_observation = ObservationModel::find($id);

        //chuoi cu
        $old_array = explode('/*endfile*/',$child_observation->clip_board);

        $index = array_search($name, $old_array);
        array_splice($old_array, $index, 1);

        //cap nhat lai chuoi
        $child_observation->clip_board = implode('/*endfile*/',$old_array);
        $child_observation->save();

        //xoa file
        $file_path = storage_path('app/public/clip_board/'.$name);
        unlink($file_path);

        return redirect()->back()->with('success','Deleted File');
    }
}
