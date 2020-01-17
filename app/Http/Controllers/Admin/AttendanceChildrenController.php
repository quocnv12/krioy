<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\models\ChildrenProfiles;
use App\models\Programs;
use Illuminate\Support\Facades\DB;

class AttendanceChildrenController extends Controller
{
    public function index(){
    	$data['programs']  = Programs::all();
        return view('pages.attendance.attendance',$data);
    }
    public function show($id){
    	$data['programs'] = Programs::all();
        $data['children_profiles'] = DB::table('programs')
        
            ->join('children_programs', 'programs.id', '=', 'children_programs.id_program')
            ->join('children_profiles', 'children_profiles.id', '=', 'children_programs.id_children')
            ->select(['children_profiles.*'])
            ->where('children_programs.id_program', '=', $id)
            ->get();
       
        return view('pages.attendance.attendance',$data);
    }
}
