<?php

namespace App\Http\Controllers\Admin\Staff;
use App\models\staff\{StaffProfiles,role};
use App\models\Programs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use DB;
use App\Http\Requests\Staff\{AddStaffRequest,EditStaffRequest};
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
    public  function PostAddStaff(AddStaffRequest $request) 
    {
       $staff = new StaffProfiles;
       $staff->first_name = $request->first_name;
       $staff->last_name = $request->last_name;
       $staff->phone = $request->phone;
       $staff->gender = $request->gender;
       $staff->email = $request->email;
       $staff->address = $request->address;
       $staff->birthday = $request->date_birthday;
       $staff->date_of_joining = $request->date_of_joining;
       $staff->blood_group = $request->blood_group;
       $password = str_random(9);
       $staff->password = bcrypt($password);
       if($request->hasFile('image'))
       {
           $file=$request->image;
           $file_name=str_random(9).'.'.$file->getClientOriginalExtension();
           $file->move('images/staff',$file_name);
           $staff->image=$file_name ;
       }
       $staff->save();
       
        if($request->id_program != Null)
        {
            $staffprogram = explode(',',$request->id_program);
            $mang=array();
            foreach ($staffprogram as $item)
            {
                $mang[]=$item;
            }
            $staff->programstaff()->Attach($mang);
        }

        $staffpermission = explode(',',$request->id_permissions);
        // dd($staffpermission);
        $mangs=array();
        foreach ($staffpermission as $item)
        {
            $mangs[]=$item;
        }
        $staff->pesmissionstaff()->Attach($mangs);

        //gửi mail thông báo  
        $email=$staff->email;
        //$url = route('link.reset.password',['email'=>$email]);
        $data=[
           // 'route' => $url,
           'first_name' => $request->first_name,
           'last_name'  => $request->last_name,
            'password' =>$password,
            'email' => $email,
            'phone' => $request->phone,
            'address' => $request->address,
        ] ;

        Mail::send('pages.staff.email', $data, function($message) use ($email){
            $message->to($email, 'Welcome to Kids-now')->subject('Welcome to Kids-now !');
        });
        if (\Lang::locale() == 'en') {
            return redirect('kids-now/staff')->with('success','Add staff success, Please check your email for your password !')->withInput();
        }
        if (\Lang::locale() == 'vi') {
            return redirect('kids-now/staff')->with('success','Thêm nhân viên thành công, vui lòng check email để lấy mật khẩu !')->withInput();
        }

    }




    //---- sưa staff
    public  function GetEditStaff($id) 
    {
        $data['staff']=StaffProfiles::find($id);
        $data['roles']=role::all();
        $data['programs']=Programs::all();
        $data['programStaff'] = DB::table('staff_programs')->where('id_staff',$id)->pluck('id_program');
        $data['programStaffs'] = DB::table('staff_programs')->where('id_staff',$id)->pluck('id_program')->toArray();
        $data['roleStaff'] = DB::table('staff_roles')->where('id_staff',$id)->pluck('id_role');
        $data['roleStaffs'] = DB::table('staff_roles')->where('id_staff',$id)->pluck('id_role')->toArray();
        return view('pages.staff.edit_staff',$data);
    }


    public  function PostEditStaff(EditStaffRequest $request ,$id) 
    {
      $staff = StaffProfiles::find($id);
      $staff->first_name = $request->first_name;
      $staff->last_name = $request->last_name;
      $staff->phone = $request->phone;
      $staff->gender = $request->gender;
      $staff->email = $request->email;
      $staff->address = $request->address;
      $staff->birthday = $request->date_birthday;
      $staff->date_of_joining = $request->date_of_joining;
      $staff->blood_group = $request->blood_group;

      if($request->hasFile('image'))
      {
            if($staff->image!=Null)
            {
                unlink('images/staff/'.$staff->image);
            }
          $file=$request->image;
          $file_name=str_random(9).'.'.$file->getClientOriginalExtension();
          $file->move('images/staff',$file_name);
          $staff->image=$file_name ;
      }


      $staff->save();
      
       if($request->id_program != Null)
       {
           $staffprogram = explode(',',$request->id_program);
           $mang=array();
           foreach ($staffprogram as $item)
           {
               $mang[]=$item;
           }
           $staff->programstaff()->Sync($mang);
       }

       $staffpermission = explode(',',$request->id_permissions);
       $mangs=array();
       foreach ($staffpermission as $item)
       {
           $mangs[]=$item;
       }
       $staff->pesmissionstaff()->Sync($mangs);

       
        if (\Lang::locale() == 'en') {
            return redirect('kids-now/staff')->with('success','Edit staff success !')->withInput();
        }
        if (\Lang::locale() == 'vi') {
            return redirect('kids-now/staff')->with('success','Sửa nhân viên thành công !')->withInput();
        }

       
    }







    public  function DeleteStaff($id) 
    {
        StaffProfiles::destroy($id);
        if (\Lang::locale() == 'en') {
            return redirect('kids-now/staff')->with('success','Delete staff success !');
        }
        if (\Lang::locale() == 'vi') {
            return redirect('kids-now/staff')->with('success','Xóa nhân viên thành công !');
        }
    }


}
