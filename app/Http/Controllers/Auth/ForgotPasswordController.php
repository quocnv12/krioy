<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\models\staff\StaffProfiles;
use Illuminate\Http\Request;
use Mail;
use Carbon\Carbon;
use App\Http\Requests\{ForgotPasswordRequest,ResetPasswordRequest};

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

    function PostFormResetPassword(ForgotPasswordRequest $request)
    {
        $email=$request->emailreset;
        $checkEmail = StaffProfiles::where('email',$email)->first();
        if(!$checkEmail)
        {
            if (\Lang::locale() == 'en') {
                return redirect()->back()->with('danger','Email does not exist !');
            }
            if (\Lang::locale() == 'vi') {
                return redirect()->back()->with('danger','Email không tồn tại !');
            }
            
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
        if (\Lang::locale() == 'en') {
            return redirect()->back()->with('success','Send mail success, pleasea check your email !');
        }
        if (\Lang::locale() == 'vi') {
            return redirect()->back()->with('success','Link lấy lại mật khẩu đã được gửi đến mail của bạn !');
        }
        
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
            if (\Lang::locale() == 'en') {
                return redirect()->back()->with('danger','Sorry the link to get the link back is incorrect !');
            }
            if (\Lang::locale() == 'vi') {
                return redirect()->back()->with('danger','Xin lỗi, link lấy lại mật khẩu không chính xác !');
            }
            
        }
        return view('pages.addmin-login.reset');
    }

    function PostResetPassword(ResetPasswordRequest $request)
    {
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
            if (\Lang::locale() == 'en') {
                return redirect()->back()->with('danger','Sorry the link to get the link back is incorrect !');
            }
            if (\Lang::locale() == 'vi') {
                return redirect()->back()->with('danger','Xin lỗi, link lấy lại mật khẩu không chính xác !');
            }
            
            
        }
        $checkEmail->password=bcrypt($request->password);

        $checkEmail->save();

        if (\Lang::locale() == 'en') {
            return redirect('login')->with('success','Password successfully recovered !');
        }
        if (\Lang::locale() == 'vi') {
            return redirect('login')->with('success','Lấy lại mật khẩu thành công !');
        }
        

    }


    

}
