<?php

namespace App\Http\Controllers\Api;
use App\Http\Requests\ChangerPasswordRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Validator;
use App\models\staff\StaffProfiles;
use Mail;
use Carbon\Carbon;

class ForgotPassWordController extends Controller
{
    public function postUpdatePassword(request $request)
    {
        $rules =  
            [
                'password_old'=>'required',
                'password'=>'required|min:8',
                'password_confirmation'=>'required|same:password'
            ];
        $validator = Validator::make($request->all(), $rules,[
                'password_old.required'=>'Please enter password old !',
                'password.required'=>'Please enter password new !',
                'password.min'=>'Password must be greater than 8 characters !',
                'password_confirmation.required'=>'Please enter confirm password new !',
                'password_confirmation.same'=>'Password entered does not match !'
        ]);
        if($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        if (Hash::check($request->password_old, Auth::user()->password))
            {
                Auth::user()->update([
                'password' => bcrypt($request->password)
            ]);
            // return redirect('login')->with('thongbao','Changer password success !');
                 return response()->json(['massage' => "Changer Password Success !"], 200);
            }
        else 
            {
                return response()->json(['massage' => "Password old false !"], 200);
               // return redirect()->back()->with('danger','Password old false !');
            }
    }







    
    //---------------------Quên mật khẩu--------------------------
    public function PostFormResetPassword(request $request)
    {
     
        $rules =  
        [
            'emailreset' =>'required|email',
        ];
        $validator = Validator::make($request->all(), $rules,[
            'emailreset.required' => 'Please enter your email !',
            'emailreset.email' => 'Email is in wrong format !',
        ]);
        if($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        $email=$request->email;
        $checkEmail = StaffProfiles::where('email',$email)->first();
        if(!$checkEmail)
        {
            return response()->json(['massage' => 'Email does not exist !'], 200);
        }
        $code = bcrypt(time().$email);
        $checkEmail->code =$code;
        $checkEmail->time_code =Carbon::now();
        $checkEmail->save();
        $url = route('link.reset.password',['code'=>$checkEmail->code,'email'=>$email]);
        $data=[
            'route' => $url
        ] ;

        Mail::send('pages.addmin-login.reset_password', $data, function($message) use ($email){
            $message->to($email, 'Reset Password')->subject('Reset Password Kids-now !');
        });
        return response()->json(['massage' => 'Send mail success, please check your email'], 200);
    }

    function PostResetPassword(request $request)
    {
        $rules =  
        [
            'password' =>'required|min:8',
            'password_confirmation'=>'required|same:password'
        ];
        $validator = Validator::make($request->all(), $rules,[
            'password.required'=>'Pleasea enter password !',
            'password_confirmation.same' => 'Password entered does not match !',
            'password_confirmation.required' => 'Pleasea enter password comfirmation !',
            'password.min' => 'Password must be greater than 8 characters !',
        ]);
        if($request->password)
        {
            $code = $request->code;
            $email = $request->email;
            $checkEmail=StaffProfiles::where([
                'code'=>$code,
                'email'=>$email
            ])->first(); 
        }

        if(!$checkEmail)
        {
            return response()->json(['massage' => 'Sorry the link to get the link back is incorrect !'], 200);
           // return redirect()->back()->with('danger','Sorry the link to get the link back is incorrect !');
        }
        $checkEmail->password=bcrypt($request->password);

        $checkEmail->save();

        return response()->json(['massage' => 'Password successfully recovered !'], 200);
    }













    //-------------------------Tài khoản dem0--------------------------
    public function postDemoAccount(request $request)
    {
        $rules =  
        [
            'first_name' =>'required',
            'email' =>'required|email|unique:staff_profiles,email',
            'phone'=>'required|numeric|min:10',
            'password'=>'required|min:8'
        ];
        $validator = Validator::make($request->all(), $rules,[
            'first_name.required'=>'Please enter first_name !',
            'email.required'=>'Please enter email !',
            'email.email'=>'Malformed email !',
            'email.unique'  => 'Email already exist !',
            'phone.required'=>'Please enter phone !',
            'phone.numeric'=>'Phone numbers must be numeric !',
            'phone.min'=>'Phone must be greater than 10 characters !',
            'password.required'=>'Please enter password !',
            'password.min'=>'Password must be greater than 8 characters !'
        ]);
        if($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        $staff= StaffProfiles::create($request->all());
        $staff->first_name = $request->first_name;
        $staff->email = $request->email;
        $staff->phone = $request->phone;
        $staff->password = bcrypt($request->password);
        $staff->active =0;
        $staff->level =0;
        $staff->image ='Staff21.png';
        $staff->save();

        $email = $staff->email;
        $code = bcrypt(time().$email);
        $url = route('user.verify.account',['id'=>$staff->id,'code'=>$code]);
        $staff->code_active =$code;
        $staff->time_active =Carbon::now();
        $staff->save();
        $data=[
            'route' => $url,
            'phone' =>$request->phone,
            'password' =>$request->password
        ] ;

        Mail::send('pages.introduce.verify', $data, function($message) use ($email){
            $message->to($email, 'Verify Account')->subject('Link Verify Account !');
        });
        return response()->json(['massage'=>'Registration successful please login email to confirm your account !'], 200);
        //return redirect()->back()->with('success','Registration successful please login email to confirm your account !');


    }
    

    public function verifyAccount(request $request)
    {
        $code = $request->code;
        $id = $request->id;
        $staff=StaffProfiles::where([
            'code_active'=>$code,
            'id'=>$id])->first();
            if(!$staff)
            {
                return response()->json(['massage'=>'Link verify false !'], 200);
                //return redirect()->back()->with('danger','Link verify false !');
            }
        $staff->active=1;
        $staff->save();
        if(Auth::loginUsingId($staff->id))
        {
            return response()->json(['massage'=>'Verify success'], 200);
        }
    }
}
