<?php

namespace App\Http\Controllers\Admin\Staff;
use App\models\staff\StaffProfiles;
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
    public  function GeAddStaff() 
    {
        return view('pages.staff.add_staff');
    }


}
