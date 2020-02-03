<?php

namespace App\Http\Controllers\Api;

use App\models\NoticeBoard;
use App\models\ProgramNotice;
use App\models\Programs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NoticeBoardController extends Controller
{

    public function index()
    {
        $programs = Programs::all();
        if (! $programs){
            return response()->json('Something wrong');
        }else{
            return response()->json([
               'program'=>$programs
            ], 200);
        }
    }

    public function detail($id){
        $notice_board = NoticeBoard::find($id);
        $programs = Programs::all();
        $programs_choose = DB::table('programs')
            ->join('programs_notice', 'programs.id', '=', 'programs_notice.id_programs')
            ->select('id')
            ->where('id_notice', '=', $id)
            ->get();
        // array chua cac id program ma children dang hoc
        $array_programs_choose = [];
        foreach ($programs_choose as $key => $value) {
            array_push($array_programs_choose, $value->id);
        }
        return response()->json([
            'notice_board'=>$notice_board,
            'programs'=>$programs,
            'array_programs_choose'=>$array_programs_choose
        ], 200);
    }

    public function create()
    {
        $programs = Programs::all();
        if (! $programs){
            return response()->json('Something wrong');
        }else{
            return response()->json([
                'program'=>$programs
            ], 200);
        }
    }


    public function store(Request $request)
    {
        $this->validate($request,
            [
                'title'     =>  'required',
                'important' =>  'nullable',
                'archive'   =>  'nullable',
                'content'   =>  'required',
                'writer'    =>  'nullable',
                'programs'  =>  'required'
            ],
            [
                'title.required'        =>  'Please input title',
                'content.required'      =>  'Please input content',
                'programs.required'     =>  'Please choose programs',
            ]);

        $notice_board = NoticeBoard::create($request->all());
        $request->important ? $notice_board->important = 1 : $notice_board->important = 0;

        if ($request->hasFile('clip_board')){
            $array_file = [];
            foreach ($request->file('clip_board') as $file_name){
                $uniqueFileName = (Str::random(4).'_'.$file_name->getClientOriginalName());
                array_push($array_file, $uniqueFileName);
                $file_name->move(storage_path('app/public/clip_board/') , $uniqueFileName);
            }

            $notice_board->clip_board = implode('/*endfile*/',$array_file);

        }
        $notice_board->save();

        if ($request->programs){
            //lay id cua notice vua tao moi xong
            $notice_id = $notice_board->id;

            //string to array
            $programs = explode(',',$request->programs);

            //luu vao bang children_programs
            foreach ($programs as $program){
                $program_notice = new ProgramNotice();
                $program_notice->id_notice = $notice_id;
                $program_notice->id_programs = $program;
                $program_notice->save();
            }
            $program_notice->save();
        }

        return response()->json([
            'notice_board'=>$notice_board
        ], 201);
    }

    public function displayClipboard($id,$name)
    {
        return response()->file(storage_path('app/public/clip_board/'.$name),[
            'Content-Disposition' => 'inline; filename="'. $name .'"']);
    }

    public function deleteClipboard($id,$name)
    {
        $notice_board = NoticeBoard::find($id);
        //chuoi cu
        $old_array = explode('/*endfile*/',$notice_board->clip_board);

        $index = array_search($name, $old_array);
        array_splice($old_array, $index, 1);

        //cap nhat lai chuoi
        $notice_board->clip_board = implode('/*endfile*/',$old_array);
        $notice_board->save();

        //xoa file
        $file_path = storage_path('app/public/clip_board/'.$name);
        unlink($file_path);

        return response()->json(null, 204);
    }

    public function show($id)
    {
        $notice_board = DB::table('notice_board')
            ->join('programs_notice','notice_board.id','=','programs_notice.id_notice')
            ->where('programs_notice.id_programs','=',$id)
            ->select('notice_board.*')
            ->orderBy('created_at','DESC')
            ->get();

        $programs = Programs::all();

        return response()->json([
            'notice_board'=>$notice_board,
            'programs'=>$programs
        ],200);
    }


    public function edit($id)
    {
        $notice_board = NoticeBoard::find($id);

        $programs = Programs::all();

        $programs_choose = DB::table('programs')
            ->join('programs_notice','programs.id','=','programs_notice.id_programs')
            ->select('id')
            ->where('id_notice','=',$id)
            ->get();

        // array chua cac id program ma children dang hoc
        $array_programs_choose = [];
        foreach ($programs_choose as $key=>$value){
            array_push($array_programs_choose, $value->id);
        }

        return response()->json([
            'notice_board'=>$notice_board,
            'programs'=>$programs,
            'array_programs_choose'=>$array_programs_choose
        ], 200);

    }


    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'title'     =>  'required',
                'important' =>  'nullable',
                'archive'   =>  'nullable',
                'content'   =>  'required',
                'writer'    =>  'nullable',
            ],
            [
                'title.required'        =>  'Please input title',
                'content.required'      =>  'Please input content',
            ]);

        $notice_board = NoticeBoard::findOrFail($id);
        $notice_board->update($request->all());
        $request->important ? $notice_board->important = 1 : $notice_board->important = 0;
        $request->archive ? $notice_board->archive = 1 : $notice_board->archive = 0;

        if ($request->programs_new){
            //array chua cac id program ma children dang hoc
            $array_programs_old = [];
            $programs_old = explode(',',$request->programs_old);    //string to array
            foreach ($programs_old as $item){
                array_push($array_programs_old, $item);
            }

            //array chua cac id program ma children moi dang ky
            $array_programs_new = [];
            $programs_new = explode(',',$request->programs_new);    //string to array
            foreach ($programs_new as $item){
                array_push($array_programs_new, $item);
            }

            //so sanh array cu va moi
            $programs_add = array_diff($array_programs_new, $array_programs_old);
            $programs_remove = array_diff($array_programs_old, $array_programs_new);

            //them record programs_notice
            foreach ($programs_add as $program_id){
                $programs_notice = new ProgramNotice();
                $programs_notice->id_notice = $id;
                $programs_notice->id_programs = $program_id;
                $programs_notice->save();
            }

            //xoa record programs_notice
            foreach ($programs_remove as $program_id){
                $programs_notice = ProgramNotice::where([['id_notice','=',$id], ['id_programs','=',$program_id]]);
                $programs_notice->delete();
            }
        }

        if ($request->hasFile('clip_board')){
            $old_array = explode('/*endfile*/',$notice_board->clip_board);
            foreach ($request->file('clip_board') as $file_name){
                $uniqueFileName = (Str::random(4).'_'.$file_name->getClientOriginalName());
                array_push($old_array, $uniqueFileName);
                $file_name->move(storage_path('app/public/clip_board/') , $uniqueFileName);
            }
            $notice_board->clip_board = implode('/*endfile*/',$old_array);
        }

        $notice_board->save();

        return response()->json([
           'notice_board'=>$notice_board
        ]);
    }


    public function destroy($id)
    {
        $notice_board = NoticeBoard::findOrFail($id);

        if ($notice_board->clip_board){
            $old_array = explode('/*endfile*/',$notice_board->clip_board);
            foreach ($old_array as $key=>$value){
                $file_path = 'app/public/clip_board/'.$value;
                if ($file_path != 'app/public/clip_board/'){
                    unlink(storage_path($file_path));
                }
            }
        }
        $notice_board->delete();

        $programs = Programs::all();

        return response()->json([
            'programs'=>$programs
        ], 204);
    }

    public function searchByTitle(Request $request)
    {
        $notice_board = NoticeBoard::where('title', 'like', '%' . $request->get('q') . '%')
            ->orderBy('title')
            ->get();

        return response()->json($notice_board);
    }
}
