<?php

namespace App\Http\Controllers\Api\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\staff\StaffProfiles;
use Validator;

class StaffController extends Controller
{
    public function index()
    {
        $staff = StaffProfiles::all();
        return response()->json(['staff'=>$staff], 200);
    }


    //lay theo id
    public function show($id)
    {
        $staff = StaffProfiles::find($id);
        if(!$staff)
        {
            return response()->json(['massage' => 'Record not found'], 404);
        }
        return response()->json(['staff' => $staff], 200);
    }

    //--------------thêm satff
    public function store(request $request)
    {
        $rules =  
        [
            'image'               =>'required|image',
             'first_name'         =>'required',
             'last_name'          =>'required',
             'phone'              =>'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|size:10|unique:staff_profiles,phone',
             'gender'             =>'required',
             'email'              =>'required|email|unique:staff_profiles,email',
             'address'            =>'required',
             'date_birthday'      =>'required|date',
            //  'blood_group'        =>'required',
             'date_of_joining'    =>'required|date',
        ];
        $validator = Validator::make($request->all(), $rules,[
            'image.required'            => 'Please chosse image !',
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
            // 'blood_group.required'      => 'Please choose blood_group !',
            'date_of_joining.required'  => 'Please choose date_of_joining !',
            'date_of_joining.date'      => 'Date_of_joining is in wrong format !',
            'gender.required'           => 'Please choose gender !',
        ]);
        if($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        $staff = StaffProfiles::create($request->all());
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
        ] ;

        Mail::send('pages.staff.email', $data, function($message) use ($email){
            $message->to($email, 'Reset Password')->subject('Welcome to Kids-now !');
        });
       return response()->json(['massage' => 'Add staff success !'], 201);

    }
    //---------------------edit staff-------------------
    public function update(request  $request,$id)
    {
        $staff = StaffProfiles::find($id);
        if(!$staff)
        {
            return response()->json(['massage' => 'Record not found'], 404);
        }
        $rules =  
            [
                
                'first_name'         =>'required',
                'last_name'          =>'required',
                'phone'              =>'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|size:10|unique:staff_profiles,phone',
                'gender'             =>'required',
                'email'              =>'required|email|unique:staff_profiles,email',
                'address'            =>'required',
                'date_birthday'      =>'required|date',
                
                'date_of_joining'    =>'required|date',
            ];
        $validator = Validator::make($request->all(), $rules,[
            
            //'image.image'               => 'Image is in wrong format !',
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
           
            'date_of_joining.required'  => 'Please choose date_of_joining !',
            'date_of_joining.date'      => 'Date_of_joining is in wrong format !',
            'gender.required'           => 'Please choose gender !',
        ]);
        $staff->update($request->all());
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
        return response()->json(['massage' => 'Edit staff success !'], 200);
    }

    //-------xoa staff------------------
    public function destroy($id)
    {
        $staff = StaffProfiles::find($id);
        if(!$staff)
        {
            return response()->json(['massage' => 'Record not found!'] , 404);
        }
        $staff->delete($id);
        return response()->json(['massage' => 'Delete staff success !'], 200);
        
    }


}
