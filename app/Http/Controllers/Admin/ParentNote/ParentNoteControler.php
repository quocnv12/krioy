<?php

namespace App\Http\Controllers\Admin\ParentNote;
use App\models\Programs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParentNoteControler extends Controller
{
    public function listParentNote()
    {
        $data['programs']=Programs::all();
        return view('pages.parent-note.parent-note',$data);
    }

    public function showParentNote($id)
    {
        $data['programs']=Programs::all();
        // $programs = Programs::orderBy('program_name')->get();
        // $children_profiles = DB::table('children_profiles')
        //                     ->join('children_programs','children_profiles.id','=','children_programs.id_children')
        //                     ->where('children_programs.id_program','=',$id)
        //                     ->orderBy('first_name')
        //                     ->get();

        return view('pages.parent-note.parent-note',[
            'children_profiles'=>$children_profiles,
            // 'food'=>$food,
            'programs'=>$programs
        ],$data);
    }



}
