<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\models\ChildrenProfiles;
use App\models\Programs;
use App\models\Attendance_children;
use App\models\Children_status;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AttendanceChildrenController extends Controller
{
    public function index(){
    	$data['programs']  = Programs::all();
    	return response()->json($data, 200);

    }
    public function show($id){
    	$data['programs'] = Programs::all();
    	$data['children_profiles'] = ChildrenProfiles::join('children_programs', 'children_profiles.id', '=', 'children_programs.id_children')
            ->join('programs', 'programs.id', '=', 'children_programs.id_program')
            ->select(['children_programs.*','children_profiles.*'])
            ->where('children_programs.id_program', '=', $id)
            ->get();

        $day = Carbon::now('Asia/Ho_Chi_Minh')->toTimeString();
        $data['dayupdate'] =  date('d', strtotime($day));
        $data['time'] = date('H:s:i', strtotime($day));

        $data['now'] = $id;
        $data['id'] = $id;
        $data['count_chil'] = $data['children_profiles']->count();
        $data['count_in'] = Children_status::where('status','1')->where('id_program',$id)->whereDay('updated_at',$data['dayupdate'])->count();
        $data['count_out'] = Children_status::where('status','2')->where('id_program',$id)->whereDay('updated_at',$data['dayupdate'])->count();
        $data['count_absent'] = Children_status::where('status','3')->where('id_program',$id)->whereDay('updated_at',$data['dayupdate'])->count();
        $data['count_active'] = Children_status::where('active','1')->where('id_program',$id)->whereDay('updated_at',$data['dayupdate'])->count();
        
        return response()->json($data, 200);

    }
}
