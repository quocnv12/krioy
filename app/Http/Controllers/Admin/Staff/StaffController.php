<?php

namespace App\Http\Controllers\Admin\Staff;
use App\models\staff\{StaffProfiles,role};
use App\models\Programs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use DB;
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
        // dd($request->all());
       $this->validate($request,[
            'image'               =>'image|nullable',
            'first_name'         =>'required',
            'last_name'          =>'required',
            'phone'              =>'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|size:10|unique:staff_profiles,phone',
            'gender'             =>'required',
            'email'              =>'required|email|unique:staff_profiles,email',
            'address'            =>'nullable',
            'date_birthday'      =>'required|date|before:today',
           // 'blood_group'        =>'required',
            'date_of_joining'    =>'required|date',
       ],[
            'image.image'               => 'Image is in wrong format !',
            'first_name.required'       => 'Please enter first_name !',
            'last_name.required'        => 'Please enter last_name !',
            'phone.required'            => 'Please enter number phone !',
            'phone.regex'               => 'Phone numbers start with 0 !',
            'phone.not_regex'           => 'Phone numbers must be numeric !',
            'phone.size'                => 'Phone number includes 10 numbers !',
            'phone.unique'              => 'Number phone already exist !',
            'email.required'            => 'Please enter email !',
            'email.email'               => 'Email is in wrong format !',
            'email.unique'              => 'Email already exist !',
            'address.required'          => 'Please enter address !',
            'date_birthday.required'    => 'Please enter date_birthday !',
            'date_birthday.date'        => 'Date_birthday is in wrong format !',
            'date_birthday.before'        => 'Date_birthday is invalid !',
           // 'blood_group.required'      => 'Please choose blood_group !',
            'date_of_joining.required'  => 'Please choose date_of_joining !',
            'date_of_joining.date'      => 'Date_of_joining is in wrong format !',
            'gender.required'           => 'Please choose gender !',
            
       ]);

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


        return redirect('kids-now/staff')->with('success','Add staff success, Please check your email for your password !')->withInput();

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


    public  function PostEditStaff(request $request ,$id) 
    {
        $this->validate($request,[
         
            'first_name'         =>'required',
            'last_name'          =>'required',
            'phone'              =>'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|size:10|unique:staff_profiles,phone,'.$id,
            'gender'             =>'required',
            'email'              =>'required|email|unique:staff_profiles,email,'.$id,
            'address'            =>'required',
            'date_birthday'      =>'required|date',
           // 'blood_group'        =>'required',
            'date_of_joining'    =>'required|date',
          
      ],[
       
        
        'first_name.required'       => 'Please enter first_name !',
        'last_name.required'        => 'Please enter last_name !',
        'phone.required'            => 'Please enter number phone !',
        'phone.regex'               => 'Phone numbers start with 0 !',
        'phone.not_regex'           => 'Phone numbers must be numeric !',
        'phone.size'                => 'Phone number includes 10 numbers !',
        'phone.unique'              => 'Number phone already exist !',
        'email.required'            => 'Please enter email !',
        'email.email'               => 'Email is in wrong format !',
        'email.unique'              => 'Email already exist !',
        'address.required'          => 'Please enter address !',
        'date_birthday.required'    => 'Please enter date_birthday !',
        'date_birthday.date'        => 'Date_birthday is in wrong format !',
       // 'blood_group.required'      => 'Please choose blood_group !',
        'date_of_joining.required'  => 'Please choose date_of_joining !',
        'date_of_joining.date'      => 'Date_of_joining is in wrong format !',
        'gender.required'           => 'Please choose gender !',
           
      ]);

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

       return redirect('kids-now/staff')->with('success','Edit staff success !')->withInput();
       
    }







    public  function DeleteStaff($id) 
    {
        StaffProfiles::destroy($id);
        return redirect('kids-now/staff')->with('success','Delete staff success !');
    }


}
