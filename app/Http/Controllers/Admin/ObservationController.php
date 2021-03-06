<?php

namespace App\Http\Controllers\Admin;
use App\models\ChildrenProfiles;
use App\models\History;
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
            return view('pages.observation.list', compact('child_observations'));
        }else {
            $child_observations = ObservationModel::orderBy('created_at','DESC')->get();
            return view('pages.observation.list', compact('child_observations'));
        }
    }

    public  function getListObservation(){
        $observationtype = ObservationTypeModel::all();
        return view('pages.observation.listobservationType', compact('observationtype'));
    }

    public function getAdd(){
        $observationtype = ObservationTypeModel::orderBy('name')->get();
        $programs = Programs::orderBy('program_name')->get();
        return view('pages.observation.add', compact('observationtype','programs'));
    }

    public function postAdd(Request $request)
    {
        $validation_vi = [
            'observations.required'         =>  'Vui lòng chọn loại đánh giá',
            'children_observations.required'=>  'Chưa có trẻ nào được chọn',
        ];

        $validation_en = [
            'observations.required'         =>  'Please choose observations',
            'children_observations.required'=>  'Please choose children',
        ];

        $this->validate($request,
            [
                'observations'          =>  'required',
                'children_observations' =>  'required',
                'detailObservation'     =>  'nullable',
            ],app()->getLocale() == 'vi' ? $validation_vi : $validation_en);


        //save history : create new history object
        $history = new History();
        $history->id_childrens = $request->children_observations;
        $history->id_program = $request->program_id;
        $array_id_records = [];     //tao array chua id observation record

        //string to array
        $children_observations = explode(',', $request->children_observations);
        $observer = Auth::user()->first_name.' '.Auth::user()->last_name;

        //luu vao bang observations

        $array_file = [];
        if ($request->hasFile('clip_board')){
        foreach ($request->file('clip_board') as $file_name){
                $uniqueFileName = (Str::random(9).'_'.$file_name->getClientOriginalName());
                $file_name->move(storage_path('/app/public/clip_board/') , $uniqueFileName);
                array_push($array_file, $uniqueFileName);
            }
        }

        foreach ($children_observations as $children_id) {
            $child_observation = new ObservationModel();
            $child_observation->id_children = $children_id;
            $child_observation->id_observations = $request->observations;
            $child_observation->detailObservation = $request->detailObservation;
            $child_observation->observer = $observer;
            $child_observation->clip_board = implode('/*endfile*/',$array_file);
            $child_observation->save();

            //push id cua doi tuong child_observation vao array
            array_push($array_id_records, $child_observation->id);
        }

        //id_records la chuoi string chua id cua cac doi tuong child_observation vua tao
        $history->id_records = implode(',',$array_id_records);
        $history->model = 'App\models\ObservationModel';
        $history->icon = 'images/Observation-01.png';
        $json_vi = [
            'Chủ Đề'    =>  'Nhận Xét & Đánh Giá',
            'Đánh Giá'  =>  $child_observation->id_observations,
            'Nội Dung Nhận Xét' =>  $child_observation->detailObservation,
            'Người Nhận Xét'    =>  $child_observation->observer
        ];

        $json_en = [
            'Model'    =>  'Observation',
            'Observations'  =>  $child_observation->id_observations,
            'Details' =>  $child_observation->detailObservation,
            'Observer'    =>  $child_observation->observer
        ];

        $history->content_vi = json_encode($json_vi);
        $history->content_en = json_encode($json_en);
        $history->save();
        //save xong history record


        return redirect()->back()->with('success',app()->getLocale() == 'vi' ? 'Thêm Thành Công !' :'Added Successfully !');
    }

//    public function getEdit($id)
//    {
//        $vendors = ObservationTypeModel::all();
//        $observationtype = ObservationTypeModel::all();
//        $child_observation  = ObservationModel::find($id);
//        if (! $child_observation){
//            return view('pages.not-found.notfound');
//        }
//        $children_profiles = ChildrenProfiles::where('id','=',$child_observation->id_children)->first();
//        $array_observation_choose = explode(',',$child_observation->id_observations);
//
//
//        return view('pages.observation.edit',compact('child_observation','observationtype','vendors','children_profiles','array_observation_choose'));
//
//    }
//    public function postEdit(Request $request, $id){
//        $this->validate($request,
//            [
//                'detailObservation'     =>  'nullable',
//            ]);
//
//        $child_observation = ObservationModel::find($id);
//        $child_observation->id_observations = $request->observation_new;
//        $child_observation->detailObservation = $request->detailObservation;
//
//          $old_array = explode('/*endfile*/',$child_observation->clip_board);
//        if ($request->hasFile('clip_board')){
//
//            foreach ($request->file('clip_board') as $file_name){
//                $uniqueFileName = (Str::random(9).'_'.$file_name->getClientOriginalName());
//                array_push($old_array, $uniqueFileName);
//                $file_name->move(storage_path('/app/public/clip_board/') , $uniqueFileName);
//            }
//            $child_observation->clip_board = implode('/*endfile*/',$old_array);
//        }
//
//        $child_observation->save();
//        return redirect()->back()->with('success',app()->getLocale() == 'vi' ? 'Cập Nhật Thành Công !' : 'Updated Successfully !');
//    }

    public function getDelete($id){
        $observation = ObservationModel::find($id);
        if (!$observation){
            return view('pages.not-found.notfound');
        }
        if ($observation->clip_board){
            $old_array = explode('/*endfile*/',$observation->clip_board);
            foreach ($old_array as $key=>$value){
                $file_path = '/app/public/clip_board/'.$value;
                if ($file_path != '/app/public/clip_board/'){
                    unlink(storage_path($file_path));
                }
            }
        }
        $observation->delete();

        return redirect(route('admin.observations.list'))->with('success',app()->getLocale() == 'vi' ? 'Xóa Thành Công !' : 'Deleted Successfully !');
    }


    public function searchByName(Request $request)
    {
        $children_profiles = ChildrenProfiles::where(DB::raw("concat(first_name ,' ', last_name)"), 'like', '%' . $request->get('q') . '%')->orderBy('first_name')->get();

        return response()->json($children_profiles);
    }


    public function showChildrenInProgram($id){
        $observationtype = ObservationTypeModel::all();
        $programs = Programs::orderBy('program_name')->get();
        $children_profiles = DB::table('children_profiles')
                            ->join('children_programs','children_profiles.id','=','children_programs.id_children')
                            ->where('children_programs.id_program','=',$id)
                            ->orderBy('first_name')
                            ->get();

        $program_id = $id;

        return view('pages.observation.add',[
            'children_profiles'=>$children_profiles,
            'observationtype'=>$observationtype,
            'programs'=>$programs,
            'program_id'=>$program_id
        ]);
    }

    public function view($id){
        $vendors = ObservationTypeModel::all();
        $observationtype = ObservationTypeModel::all();
        $child_observation = ObservationModel::find($id);
        if (!$child_observation || $id == 0){
            return view('pages.not-found.notfound');
        }
        $children_profiles = ChildrenProfiles::where('id','=',$child_observation->id_children)->first();
        $array_observation_choose = explode(',',$child_observation->id_observations);

        return view('pages.observation.view',compact('observationtype','vendors','children_profiles','array_observation_choose','child_observation'));
    }

    public function displayClipboard($id,$name)
    {
        return response()->file(storage_path('/app/public/clip_board/'.$name),[
            'Content-Disposition' => 'inline; filename="'. $name .'"']);
    }

    public function deleteClipboard($id,$name)
    {
        $child_observation = ObservationModel::find($id);
        if(! $child_observation){
            return view('pages.not-found.notfound');
        }
        //chuoi cu
        $old_array = explode('/*endfile*/',$child_observation->clip_board);

        $index = array_search($name, $old_array);
        array_splice($old_array, $index, 1);

        //cap nhat lai chuoi
        $child_observation->clip_board = implode('/*endfile*/',$old_array);
        $child_observation->save();

        //xoa file
        $file_path = storage_path('/app/public/clip_board/'.$name);
        unlink($file_path);

        return redirect()->back()->with('success',app()->getLocale() == 'vi' ? 'Xóa File Thành Công' : 'Deleted File Successfully !');
    }
}
