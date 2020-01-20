<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $maxAttempts = 5; // mặc định là 5, thay đổi thành 3
    protected $decayMinutes = 1; 
    public  function GetLogin() 
    {
        return view('pages.addmin-login.login');
    }

    
    public  function PostLogin(LoginRequest $request) 
    {
       //dd($request->all());
       
       if($this->hasTooManyLoginAttempts($request))
        {
            $this->fireLockoutEvent($request);
            return redirect()->back()->with([
                "expired" => $this->decayMinutes * 60
            ]);
        }
        else
        {
         //   $this->incrementLoginAttempts($request);
            $phone = $request->phone;
            $password = $request->password;
            if(Auth::attempt(['phone' => $phone, 'password' => $password],$request->remember))
            {
                Auth::logoutOtherDevices(Auth::user()->password);
                return redirect('kids-now');
            }
            else
            {
                return  redirect()->back()->with("thongbao","Tài khoản hoặc mật khẩu không chính xác !")->withInput();
            }
        }
    }

    public function Logout()
    {
        Auth::logout();
        return redirect('login');
    }


}
