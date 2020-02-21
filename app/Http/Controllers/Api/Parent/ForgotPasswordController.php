<?php

namespace App\Http\Controllers\Api\Parent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Validator;
use App\models\ParentProfiles;
use Mail;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{

    //đổi mật khẩu
    public function postUpdatePassword(request $request)
    {
        $rules =  
            [
                'password_old'=>'required',
                'password'=>'required|min:8|max:30',
                'password_confirmation'=>'required|same:password'
            ];
        $validator = Validator::make($request->all(), $rules,[
                'password_old.required'=>'Please enter password old !',
                'password.required'=>'Please enter password new !',
                'password.min'=>'Password from 8 to 30 characters !',
                'password.max'=>'Password from 8 to 30 characters !',
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

















   //--------quên mật khẩu----------
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
        $email=$request->emailreset;
        $checkEmail = ParentProfiles::where('email',$email)->first();
        if(!$checkEmail)
        {
            return response()->json(['massage' => 'Email does not exist !'], 200);
        }
        $code = bcrypt(time().$email);
        $checkEmail->code =$code;
        $checkEmail->time_code =Carbon::now();
        $checkEmail->save();
        $url = route('link.reset.password.parent',['code'=>$checkEmail->code,'email'=>$email]);
        $data=[
            'route' => $url,
            'first_name' =>$checkEmail->first_name,
            'last_name' =>$checkEmail->last_name
        ] ;

        Mail::send('pages.addmin-login.reset_password', $data, function($message) use ($email){
            $message->to($email, 'Reset Password')->subject('Reset Password Kids-now !');
        });
        return response()->json(['massage' => 'Send mail success, please check your email'], 200);
    }

    public function ResetPasswordParent(request $request)
    {
        $code = $request->code;
        $email = $request->email;
        $checkEmail=ParentProfiles::where([
            'code'=>$code,
            'email'=>$email])->first();
        if(!$checkEmail)
        {
            return redirect()->back()->with('danger','Sorry the link to get the link back is incorrect !');
        }
        return view('pages.addmin-login.reset_password_parent');
    }


    function PostResetPasswordParent(request $request)
    {
        $rules =  
        [
            'password' =>'required|min:8|max:30',
            'password_confirmation'=>'required|same:password'
        ];
        $validator = Validator::make($request->all(), $rules,[
            'password.required'=>'Pleasea enter password !',
            'password_confirmation.same' => 'Password entered does not match !',
            'password_confirmation.required' => 'Pleasea enter password comfirmation !',
            'password.min'=>'Password from 8 to 30 characters !',
            'password.max'=>'Password from 8 to 30 characters !'
        ]);
        if($request->password)
        {
            $code = $request->code;
            $email = $request->email;
            $checkEmail=ParentProfiles::where([
                'code'=>$code,
                'email'=>$email
            ])->first(); 
        }

        if(!$checkEmail)
        {
            //return response()->json(['massage' => 'Sorry the link to get the link back is incorrect !'], 200);
           return redirect()->back()->with('danger','Sorry the link to get the link back is incorrect !');
        }
        $checkEmail->password=bcrypt($request->password);

        $checkEmail->save();
        
        return redirect()->back()->with('success','Password successfully recovered !');
    }




}
