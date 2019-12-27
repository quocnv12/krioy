<?php

namespace App\Http\Controllers\Admin;

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
        //
        $programs = Programs::all();
        return view('pages.notice.notice_board',['programs'=>$programs]);
    }

    public function detail($id){
        $notice_board = NoticeBoard::find($id);
        $programs = DB::table('programs')
                    ->join('programs_notice','programs.id','=','programs_notice.id_programs')
                    ->where('programs_notice.id_programs','=',$id)
                    ->select('programs.program_name')
                    ->groupBy('programs.program_name')
                    ->get();

        return view('pages.notice.notice_detail',['notice_board'=>$notice_board, 'programs'=>$programs]);
    }

    public function create()
    {
        //
        $programs = Programs::all();
        return view('pages.notice.add_notice',['programs'=>$programs]);
    }


    public function store(Request $request)
    {
        //
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
            $uniqueFileName = ($request->file('clip_board')->getClientOriginalName());
            $notice_board->clip_board = $uniqueFileName;

            $request->file('clip_board')->move(storage_path('app/public/clip_board/') , $uniqueFileName);
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

        return redirect()->back()->with('notify','Added Successfully');
    }

    public function displayClipboard($id)
    {
        $notice_board = NoticeBoard::findOrFail($id);
        return response()->file(storage_path('app/public/clip_board/'.$notice_board->clip_board),[
            'Content-Disposition' => 'inline; filename="'. $notice_board->clip_board .'"']);
    }


    public function show($id)
    {
        //
        $notice_board = DB::table('notice_board')
                        ->join('programs_notice','notice_board.id','=','programs_notice.id_notice')
                        ->where('programs_notice.id_programs','=',$id)
                        ->select('notice_board.*')
                        ->orderBy('created_at','DESC')
                        ->get();

        $programs = Programs::all();

        //dd($notice_board);
        return view('pages.notice.notice_board',['notice_board'=>$notice_board, 'programs'=>$programs]);
    }


    public function edit($id)
    {
        //
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

        return view('pages.notice.edit_notice',['notice_board'=>$notice_board, 'programs'=>$programs, 'array_programs_choose'=>$array_programs_choose]);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
