<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\models\staff\StaffProfiles;
use Illuminate\Http\Request;
use Mail;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

    }


    public function GetFormResetPassword()
    {
        return view('pages.addmin-login.form_reset_password');
    }

    function PostFormResetPassword(request $request)
    {
     //   dd($request->all());
        $this->validate($request,
        [
            'emailreset' =>'required|email',
        ],
        [
            'emailreset.required' => 'Please Enter Your Email !',
            'emailreset.email' => 'Email is in wrong format !',
        ]);

        $email=$request->emailreset;
        $checkEmail = StaffProfiles::where('email',$email)->first();
        if(!$checkEmail)
        {
            return redirect()->back()->with('danger','Email does not exist !');
        }
        $code = bcrypt(time().$email);
        $checkEmail->code =$code;
        $checkEmail->time_code =Carbon::now();
        $checkEmail->save();
        $url = route('link.reset.password',['code'=>$checkEmail->code,'email'=>$email]);
        $data=[
            'route' => $url,
            'first_name' => $checkEmail->first_name,
            'last_name' => $checkEmail->last_name,
        ] ;

        Mail::send('pages.addmin-login.reset_password', $data, function($message) use ($email){
            $message->to($email, 'Reset Password')->subject('Reset Password Kids-now !');
        });
        return redirect()->back()->with('success','Send mail success, pleasea check your email !');
    }

    public function ResetPassword(request $request)
    {
        $code = $request->code;
        $email = $request->email;
        $checkEmail=StaffProfiles::where([
            'code'=>$code,
            'email'=>$email])->first();
        if(!$checkEmail)
        {
            return redirect()->back()->with('danger','Sorry the link to get the link back is incorrect !');
        }
        return view('pages.addmin-login.reset');
    }

    function PostResetPassword(request $request)
    {
        $this->validate($request,
        [
            'password' =>'required|min:8',
            'password_confirmation'=>'required|same:password'
        ],
        [
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
            
            return redirect()->back()->with('danger','Sorry the link to get the link back is incorrect !');
        }
        $checkEmail->password=bcrypt($request->password);

        $checkEmail->save();

        return redirect('login')->with('success','Password successfully recovered !');

    }


    

}
