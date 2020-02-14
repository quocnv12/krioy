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
    public function postAdd(Request $req,$id){
        
        $children_attendance = explode(',', $req->children_attendance);
                
        $day = Carbon::now('Asia/Ho_Chi_Minh')->toTimeString();
        $monthupdate =  date('m', strtotime($day));
        $dayupdate =  date('Y-m-d', strtotime($day));
        $yearupdate =  date('Y', strtotime($day));
        $timestatus =  date('d-m-Y H:i:s', strtotime($day));

        
        if($req->children_attendance==null){
        	return response()->json(['message'=>'You have not chosen children !'], 404);
        }else{
            foreach ($children_attendance as $id_children) {

                $chil_profiles = ChildrenProfiles::find($id_children);
                // check attendance / day,month,year
                $check_attendance_month = Children_status::where('id_children',$id_children)->whereMonth('created_at',$monthupdate)->first();
                $check_attendance_year = Children_status::where('id_children',$id_children)->whereYear('updated_at',$yearupdate)->first();

                $check_attendance_day = Children_status::where('id_children',$id_children)->whereDate('updated_at',$dayupdate)->first();

                if(empty($check_attendance_day)){
                    $chil_status = new Children_status;
                    $chil_status->id_children = $id_children;
                    $chil_status->id_program = $id;
                    if($req->children_status == 1) {
                        $chil_status->in = $timestatus;
                    }elseif($req->children_status == 2){
                        $chil_status->out = $timestatus;
                    }elseif($req->children_status == 3){
                        $chil_status->absent = $timestatus;
                    }
                    $chil_status->status = $req->children_status;
                    $chil_status->active = '1';
                    $chil_status->save();
                    
                }else{
                    $chil_status = Children_status::where('id_children',$id_children)->whereDate('updated_at',$dayupdate)->first();
                    if($req->children_status == 1) {
                        $chil_status->in = $timestatus;
                        $chil_status->absent = null;
                    }elseif($req->children_status == 2){
                        $chil_status->out = $timestatus;
                        $chil_status->absent = null;
                    }elseif($req->children_status == 3){
                        $chil_status->in = null;
                        $chil_status->out = null;
                        $chil_status->absent = $timestatus;
                    }
                    $chil_status->status = $req->children_status;
                    $chil_status->active = '1';
                    $chil_status->save();
                }
                
            }
            return response()->json(['message'=>'Attendance success !'],201);
        }
        
    }
    public function list(Request $req){
        
        $data['child_atd1'] = Children_status::where('id_program', '=', $req->program)->whereDay('created_at', '=', $req->day)->whereMonth('created_at', '=', $req->month)->whereYear('created_at', '=', $req->year)->first();
        if ($req->program || $req->day || $req->month || $req->year) {
        	$data['programs']  = Programs::all();
            $data['child_atd'] = Children_status::where('id_program', '=', $req->program)->whereDay('created_at', '=', $req->day)->whereMonth('created_at', '=', $req->month)->whereYear('created_at', '=', $req->year)->get();
            $data['id_program'] = $req->program;
            $data['day'] = $req->day;
            $data['month'] = $req->month;
            
            return response()->json($data,200);
        }else {
            return response()->json(['message'=>'Please chosen class and datetime!'],404);
        }
       
    }
}
