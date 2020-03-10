<?php

namespace App\Http\Controllers\Admin;

use App\models\Diary;
use App\models\DiaryType;
use App\models\Programs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\models\History;
use Illuminate\Support\Str;
use App\models\ChildrenProfiles;

class DiaryController extends Controller
{

    public function index()
    {
    }


    public function create()
    {
        $diary_types = DiaryType::orderBy('name')->get();
        $programs = Programs::orderBy('program_name')->get();
        return view('pages.diary.add', compact('diary_types','programs'));
    }


    public function store(Request $request)
    {

        $validation_vi = [
            'diary.required'         =>  'Vui lòng chọn loại nhật ký',
            'children_diary.required'=>  'Chưa có trẻ nào được chọn',
            'detail.required'       =>  'Vui lòng nhập nội dung nhật ký'
        ];

        $validation_en = [
            'diary.required'         =>  'Please choose observations',
            'children_diary.required'=>  'Please choose children',
            'detail.required'       =>  'Please fill in the detail'
        ];

        $this->validate($request,
            [
                'diary'          =>  'required',
                'children_diary' =>  'required',
                'detail'        =>  'required',
            ],app()->getLocale() == 'vi' ? $validation_vi : $validation_en);

        //save history : create new history object
        $history = new History();
        $history->id_childrens = $request->children_diary;
        $history->id_program = $request->program_id;
        $array_id_records = [];     //tao array chua id observation record


        //string to array
        $children_diary = explode(',', $request->children_diary);
        //luu vao bang diary
        foreach ($children_diary as $children_id) {
            $diary = new Diary();
            $diary->id_children = $children_id;
            $diary->diary_types = $request->diary;
            $diary->detail = $request->detail;
            if ($request->hasFile('clip_board')){
                $array_file = [];
                foreach ($request->file('clip_board') as $file_name){
                    $uniqueFileName = (Str::random(9).'_'.$file_name->getClientOriginalName());
                    array_push($array_file, $uniqueFileName);
                    $file_name->move(storage_path('/app/public/clip_board/') , $uniqueFileName);
                }
                $diary->clip_board = implode('/*endfile*/',$array_file);
            }

            $diary->save();

            //push id cua doi tuong diary vao array
            array_push($array_id_records, $diary->id);
        }

        //id_records la chuoi string chua id cua cac doi tuong diary vua tao
        $history->id_records = implode(',',$array_id_records);
        $history->model = 'App\models\Diary';
        $history->icon = 'images/Diary.png';
        $json_vi = [
            'Chủ Đề'    =>  'Nhật Ký',
            'Loại Nhật Ký'  =>  $diary->diary_types,
            'Nội Dung Nhật Ký' =>  $diary->detail,
        ];

        $json_en = [
            'Model'    =>  'Diary',
            'Diary Types'  =>  $diary->diary_types,
            'Details' =>  $diary->detail,
        ];

        $history->content_vi = json_encode($json_vi);
        $history->content_en = json_encode($json_en);
        $history->save();
        //save xong history record


        return redirect()->back()->with('success',app()->getLocale() == 'vi' ? 'Thêm Thành Công !' :'Added Successfully !');
    }


    public function showChildrenInProgram($id){
        $diary_types = DiaryType::all();
        $programs = Programs::orderBy('program_name')->get();
        $children_profiles = DB::table('children_profiles')
            ->join('children_programs','children_profiles.id','=','children_programs.id_children')
            ->where('children_programs.id_program','=',$id)
            ->orderBy('first_name')
            ->get();
        $program_id = $id;


        return view('pages.diary.add',[
            'children_profiles'=>$children_profiles,
            'diary_types'=>$diary_types,
            'programs'=>$programs,
            'program_id'=>$program_id
        ]);
    }

    public function view($id)
    {
        $diary_types = DiaryType::all();
        $children_diary = Diary::find($id);
        if (!$children_diary || $id == 0){
            return view('pages.not-found.notfound');
        }
        $children_profiles = ChildrenProfiles::where('id','=',$children_diary->id_children)->first();
        $array_diary_choose = explode(',',$children_diary->diary_types);

        return view('pages.diary.view', compact('diary_types', 'children_profiles', 'array_diary_choose', 'children_diary'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $diary = Diary::find($id);
        if (!$diary){
            return view('pages.not-found.notfound');
        }
        if ($diary->clip_board){
            $old_array = explode('/*endfile*/',$diary->clip_board);
            foreach ($old_array as $key=>$value){
                $file_path = '/app/public/clip_board/'.$value;
                if ($file_path != '/app/public/clip_board/'){
                    unlink(storage_path($file_path));
                }
            }
        }
        $diary->delete();

        return redirect(route('admin.observations.list'))->with('success',app()->getLocale() == 'vi' ? 'Xóa Thành Công !' : 'Deleted Successfully !');
    }

    public function displayClipboard($id,$name)
    {
        return response()->file(storage_path('/app/public/clip_board/'.$name),[
            'Content-Disposition' => 'inline; filename="'. $name .'"']);
    }

    public function deleteClipboard($id,$name)
    {
        $diary = Diary::find($id);
        if(! $diary){
            return view('pages.not-found.notfound');
        }
        //chuoi cu
        $old_array = explode('/*endfile*/',$diary->clip_board);

        $index = array_search($name, $old_array);
        array_splice($old_array, $index, 1);

        //cap nhat lai chuoi
        $diary->clip_board = implode('/*endfile*/',$old_array);
        $diary->save();

        //xoa file
        $file_path = storage_path('/app/public/clip_board/'.$name);
        unlink($file_path);

        return redirect()->back()->with('success',app()->getLocale() == 'vi' ? 'Xóa File Thành Công' : 'Deleted File Successfully !');
    }
}
