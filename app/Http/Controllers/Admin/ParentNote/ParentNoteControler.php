<?php

namespace App\Http\Controllers\Admin\ParentNote;
use App\models\Programs;
use App\models\parentnote\parent_note;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class ParentNoteControler extends Controller
{
    public function listParentNote()
    {
        $data['programs']= Programs::orderBy('program_name')->get();
        return view('pages.parent-note.parent-note',$data);
    }

    public function viewParentNote($id)
    {
        $data['programs']=Programs::all();
        $data['children_profiles']=Programs::find($id);
        
        return view('pages.parent-note.parent-note',$data);
    }

    public function detailParentNote($id)
    {
        $data['programs']=Programs::all();
        $data['children_profiles']=Programs::find($id);
        
        return view('pages.parent-note.detail-parent-note',$data);
    }



}
