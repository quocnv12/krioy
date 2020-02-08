<?php

namespace App\Http\Controllers\Admin;

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
        $day = Carbon::now('Asia/Ho_Chi_Minh')->toTimeString();
        $dayupdate =  date('d', strtotime($day));

        $data['count_chil'] = $data['children_profiles']->count();
        $data['count_in'] = Children_status::where('status','1')->whereDay('updated_at',$dayupdate)->count();
        $data['count_out'] = Children_status::where('status','2')->whereDay('updated_at',$dayupdate)->count();
        $data['count_absent'] = Children_status::where('status','3')->whereDay('updated_at',$dayupdate)->count();
        
        return view('pages.attendance.attendance',$data);
    }
   
    public function postAdd(Request $req){
        
        $children_attendance = explode(',', $req->children_attendance);
        
        $day = Carbon::now('Asia/Ho_Chi_Minh')->toTimeString();
        $monthupdate =  date('m', strtotime($day));
        $dayupdate =  date('d', strtotime($day));
        $yearupdate =  date('Y', strtotime($day));
        $timestatus =  date('d-m-Y H:i:s', strtotime($day));

        
        foreach ($children_attendance as $id_children) {
            // check attendance / day,month,year
            $check_attendance_month = Attendance_children::where('id_children',$id_children)->whereMonth('created_at',$monthupdate)->first();
            $check_attendance_day = Attendance_children::where('id_children',$id_children)->whereDay('updated_at',$dayupdate)->first();
            $check_attendance_year = Attendance_children::where('id_children',$id_children)->whereYear('updated_at',$yearupdate)->first();
            
            if(empty($check_attendance_day)){
                echo 'Chưa điểm rank';
                if(empty($check_attendance_year)){
                    echo ' Không trùng năm ';

                    $chil_status = new Children_status;
                    $chil_status->id_children = $id_children;
                    if($req->children_status == 1) {
                        $chil_status->in = $timestatus;
                    }elseif($req->children_status == 2){
                        $chil_status->out = $timestatus;
                    }elseif($req->children_status == 3){
                        $chil_status->absent = $timestatus;
                    }
                    $chil_status->status = $req->children_status;
                    $chil_status->save();

                    $atd = new Attendance_children;
                    $atd->id_children = $id_children;
                    if($req->children_status == 1) {
                        $atd->total_come += 1;
                        $atd->total_absent += 0;
                    }else{
                        $atd->total_come += 0;
                        $atd->total_absent += 1;
                    }
                    $atd->save();
                }else{
                    if(empty($check_attendance_month)){
                        $atd = new Attendance_children;
                        $atd->id_children = $id_children;
                        if($req->children_status == 1) {
                            $atd->total_come += 1;
                            $atd->total_absent += 0;
                        }else{
                            $atd->total_come += 0;
                            $atd->total_absent += 1;
                        }
                        $atd->save();
                        
                    }else{
                        $atd = Attendance_children::where('id_children','=',$id_children)->whereMonth('created_at',$monthupdate)->first();
                        if($req->children_status == 1) {
                            $atd->total_come += 1;
                        }else{
                            $atd->total_absent += 1;
                        }
                        $atd->save();
                    }
                }

                
            }else{
                echo 'Đã điểm rank rồi !';
                if(empty($check_attendance_month)){
                    $atd = new Attendance_children;
                    $atd->id_children = $id_children;
                    if($req->children_status == 1) {
                        $atd->total_come += 1;
                        $atd->total_absent += 0;
                    }else{
                        $atd->total_come += 0;
                        $atd->total_absent += 1;
                    }
                    $atd->save();
                    
                }else{
                // update children_status
                    $chil_status = Children_status::where('id_children',$id_children)->whereDay('updated_at',$dayupdate)->first();
                    if($req->children_status == 1) {
                        $chil_status->in = $timestatus;
                    }elseif($req->children_status == 2){
                        $chil_status->out = $timestatus;
                    }elseif($req->children_status == 3){
                        $chil_status->absent = $timestatus;
                    }
                    $chil_status->status = $req->children_status;

                // update Attendance_children
                    $atd = Attendance_children::where('id_children','=',$id_children)->whereMonth('created_at',$monthupdate)->first();
                    if($req->children_status == 1) {
                        $atd->total_come += 1;
                        $atd->total_absent -= 1;
                    }else{
                        $atd->total_come -= 1;
                        $atd->total_absent += 1;
                    }
                    $atd->save();
                }
            }
         
        }
        
        
    }
}
