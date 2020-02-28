<?php

namespace App\Http\Controllers\Api;

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
            $child_observations = ObservationModel::whereMonth('created_at', '=', $request->month)->whereYear('created_at', '=', $request->year)->orderBy('created_at','DESC')->get();
            if (! $child_observations){
                return response()->json(['message'=>'Something wrong'], 404);
            }else{
                return response()->json([
                    'child_observations'=>$child_observations
                ], 200);
            }
        }else {
            $child_observations = ObservationModel::orderBy('created_at','DESC')->get();
            if (! $child_observations){
                return response()->json(['message'=>'Something wrong'], 404);
            }else{
                return response()->json([
                    'child_observations'=>$child_observations
                ], 200);
            }
        }
    }


    public function getChild(){
        $observationtype = ChildrenProfiles::all();
        return response()->json([
            'observationtype'=>$observationtype
        ], 200);
    }

    public function getListObservation(){
        $observationtype = ObservationTypeModel::all();
        return response()->json([
            'observationtype'=>$observationtype
        ], 200);
    }

    public function getAdd(){
        $observationtype = ObservationTypeModel::all();
        $programs = Programs::all();
        return response()->json([
            'observationtype'=>$observationtype,
            'programs'=>$programs
        ]);
    }

    public function postAdd(Request $request)
    {
        $rules = [
                'observations'          =>  'required',
                'children_observations' =>  'required',
                'detailObservation'     =>  'nullable',
            ];

        $validation_vi = [
            'observations.required'         =>  'Vui lòng chọn loại đánh giá',
            'children_observations.required'=>  'Chưa có trẻ nào được chọn',
        ];

        $validation_en = [
            'observations.required'         =>  'Please choose observations',
            'children_observations.required'=>  'Please choose children',
        ];

         $validator = Validator::make($request->all(), $rules,app()->getLocale() == 'vi' ? $validation_vi : $validation_en);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        //string to array
        $children_observations = explode(',', $request->children_observations);
        $observer = Auth::user()->first_name.' '.Auth::user()->last_name;

        //luu vao bang observations
        foreach ($children_observations as $children_id) {
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
        return response()->json([
            'children_observations'=>$children_observations
        ], 201);
    }

    public function getEdit($id)
    {
        $vendors = ObservationTypeModel::all();
        $observationtype = ObservationTypeModel::all();
        $child_observation = ObservationModel::find($id);
        $children_profiles = ChildrenProfiles::where('id','=',$child_observation->id_children)->first();
        $array_observation_choose = explode(',',$child_observation->id_observations);

        return response()->json([
            'observationtype'=>$observationtype,
            'vendors'=>$vendors,
            'child_observation'=>$child_observation,
            'children_profiles'=>$children_profiles,
            'array_observation_choose'=>$array_observation_choose,
        ], 200);
    }
    public function postEdit(Request $request, $id){
        $rules = [
            'observations'          =>  'required',
            'children_observations' =>  'required',
            'detailObservation'     =>  'nullable',
        ];

        $validator = Validator::make($request->all(), $rules,[
            'observations.required'         =>  'Please choose observations',
            'children_observations.required'=>  'Please choose children',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $child_observation = ObservationModel::find($id);
        if (!$child_observation){
            return response()->json(['message'=>'Something wrong'], 404);
        }else{
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
            return response()->json([
                'child_observation'=>$child_observation
            ], 200);
        }

    }

    public function getDelete($id){
        $observation= DB::table('observations')->where('id',$id)->delete();
        if (!$observation){
            return response()->json(['message'=>'Something wrong'], 404);
        }else{
            if ($observation->clip_board){
                $old_array = explode('/*endfile*/',$observation->clip_board);
                foreach ($old_array as $key=>$value){
                    $file_path = 'app/public/clip_board/'.$value;
                    if ($file_path != 'app/public/clip_board/'){
                        unlink(storage_path($file_path));
                    }
                }
            }
            return response()->json(null, 204);
        }
    }

    public function searchByName(Request $request)
    {
        $children_profiles = ChildrenProfiles::where(DB::raw("concat(first_name ,' ', last_name)"), 'like', '%' . $request->get('q') . '%')->get();

        return response()->json([
            'children_profiles'=>$children_profiles
        ], 200);
    }


    public function showChildrenInProgram($id){
        $observationtype = ObservationTypeModel::all();
        $programs = Programs::all();
        $children_profiles = DB::table('children_profiles')
            ->join('children_programs','children_profiles.id','=','children_programs.id_children')
            ->where('children_programs.id_program','=',$id)
            ->get();
        return response()->json([
            'children_profiles'=>$children_profiles,
            'observationtype'=>$observationtype,
            'programs'=>$programs
        ], 200);
    }

    public function view($id){
        $vendors = ObservationTypeModel::all();
        $observationtype = ObservationTypeModel::all();
        $child_observation = ObservationModel::find($id);
        $children_profiles = ChildrenProfiles::where('id','=',$child_observation->id_children)->first();
        $array_observation_choose = explode(',',$child_observation->id_observations);

        if (! $child_observation){
            return response()->json(['message'=>'Something wrong'], 404);
        }else{
            return response()->json([
                'observationtype'=>$observationtype,
                'vendors'=>$vendors,
                'children_profiles'=>$children_profiles,
                'array_observation_choose'=>$array_observation_choose,
            ], 200);
        }
    }

    public function displayClipboard($id,$name)
    {
        return response()->file(storage_path('app/public/clip_board/'.$name),[
            'Content-Disposition' => 'inline; filename="'. $name .'"']);
    }

    public function deleteClipboard($id,$name)
    {
        $child_observation = ObservationModel::find($id);
        if (!$child_observation){
            return response()->json(['message'=>'Something wrong'], 404);
        }else {
            //chuoi cu
            $old_array = explode('/*endfile*/', $child_observation->clip_board);

            $index = array_search($name, $old_array);
            array_splice($old_array, $index, 1);

            //cap nhat lai chuoi
            $child_observation->clip_board = implode('/*endfile*/', $old_array);
            $child_observation->save();

            //xoa file
            $file_path = storage_path('app/public/clip_board/' . $name);
            unlink($file_path);

            return response()->json(null, 204);
        }
    }
}
