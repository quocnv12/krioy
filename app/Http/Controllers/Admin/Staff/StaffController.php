<?php

namespace App\Http\Controllers\Admin\Staff;
use App\models\staff\{StaffProfiles,role};

use App\models\Programs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffController extends Controller
{
    // danh sach
    public  function GetListStaff() 
    {
        $data['staff']=StaffProfiles::all();
        return view('pages.staff.staff_profile',$data);
    }
    //-----them
    public  function GetAddStaff() 
    {
        $data['roles']=role::all();
        $data['programs']=Programs::all();
        return view('pages.staff.add_staff',$data);
    }
    public  function PostAddStaff(request $request) 
    {
        dd($request->all());
       $this->validate($request,[

       ],[

       ]);


    }


}
