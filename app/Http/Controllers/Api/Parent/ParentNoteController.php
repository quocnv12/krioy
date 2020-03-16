<?php

namespace App\Http\Controllers\Api\Parent;

use App\models\ChildrenParent;
use App\models\ChildrenProfiles;
use App\models\parentnote\parentnote;
use App\models\parentnote\parentnotecontent;
use App\models\ParentProfiles;
use App\models\Programs;
use Illuminate\Http\Request;
use App\models\ParentModule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ParentNoteController extends Controller
{
    public function index(){

    }

    public function view($id){
        $parent_note = parentnote::find($id);
        $parent_note_content = $parent_note->parent_note_content;

        return response()->json([
            'parent_note_content'=>$parent_note_content
        ], 200);
    }

    public function create(){

        $title = ParentModule::all();
        $id_children = ChildrenParent::where('id_parent',Auth::user()->id)->first()->id_children;
        $programs = ChildrenProfiles::find($id_children)->chil_program;
        return response()->json([
            'title'         =>  $title,
            'programs'      =>  $programs
        ], 200);
    }

    public function storeParent($id){
        foreach (explode(',',request()->id_program) as $item){
            $parent_note = new parentnote();
            $parent_note->id_children = ChildrenParent::where('id_parent',Auth::user()->id)->first()->id_children;
            $parent_note->title = request()->title;
            $parent_note->id_program = $item;
            $parent_note->save();
        }

        $parent_note_content = new parentnotecontent();
        $parent_note_content->id_parent = Auth::user()->id;
        $parent_note_content->id_parent_note = $parent_note->id;
        $parent_note_content->content = request()->content;
        $parent_note_content->save();

        return response()->json([
            'paren_note'=>$parent_note,
            'paren_note_content'=>$parent_note_content,
        ], 201);
    }

    public function storeStaff($id){
        $parent_note_content = new parentnotecontent();
        $parent_note_content->id_staff = Auth::user()->id;
        $parent_note_content->id_parent_note = $parent_note->id;
        $parent_note_content->content = request()->content;
        $parent_note_content->save();

        return response()->json([
            'paren_note'=>$parent_note,
            'paren_note_content'=>$parent_note_content,
        ], 201);
    }

    public function delete(){

    }
}
