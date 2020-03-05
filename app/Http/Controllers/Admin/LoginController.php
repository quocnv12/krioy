<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Requests\ChangerPasswordRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use Hash;
use App\models\staff\StaffProfiles;
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
       
       // if($this->hasTooManyLoginAttempts($request))
       //  {
       //      $this->fireLockoutEvent($request);
       //      return redirect()->back()->with([
       //          "expired" => $this->decayMinutes * 60
       //      ]);
       //  }
       //  else
       //  {
          // $this->incrementLoginAttempts($request);
            $phone = $request->phone;   
            $password = $request->password;
            if(Auth::attempt(['phone' => $phone, 'password' => $password],$request->remember))
            {
            //  Auth::logoutOtherDevices(Auth::user()->password);
            //   dd(Auth::user()->active==0);
               if (Auth::user()->active==0) 
                {
                    Auth()->logout();
                        if (\Lang::locale() == 'en') {
                            return redirect('login')->with('danger', 'You need to verify the account !');
                        }
                        if (\Lang::locale() == 'vi') {
                            return redirect('login')->with('danger', 'Tài khoản chưa được kích hoạt !');
                        }
                }
                return redirect('kids-now');
            }
            else
            {
                if (\Lang::locale() == 'en') {
                    return redirect()->back()->with("danger","Phone or password false !")->withInput();
                }
                if (\Lang::locale() == 'vi') {
                    return redirect()->back()->with("danger","Số điện thoại hoặc mật khẩu sai !")->withInput();
                }
            }
        // }
    }

    public function Logout()
    {
        Auth::logout();
        return redirect('/');
    }


    //thay doi mat khau
    public function getUpdatePassword()
    {
        return view('pages.addmin-login.changer_password.changer_password');
    }

    public function postUpdatePassword(ChangerPasswordRequest $request)
    {
        if (Hash::check($request->password_old, Auth::user()->password))
            {
                // $user=StaffProfiles::find(Auth::user()->id);
                // $user->password=bcrypt($request->password);
                // $user->save();
                Auth::user()->update([
                    'password' => bcrypt($request->password)
                ]);
                if (\Lang::locale() == 'en') {
                    return redirect()->back()->with('success','Changer password success !');
                }
                if (\Lang::locale() == 'vi') {
                    return redirect()->back()->with('success','Đổi mật khẩu thành công !');
                }
            }
        else 
            {
                return redirect()->back()->with('danger','Password old false !');
                if (\Lang::locale() == 'en') {
                    return redirect()->back()->with('danger','Password old false !');
                }
                if (\Lang::locale() == 'vi') {
                    return redirect()->back()->with('danger','Mật khẩu cũ không chính xác !');
                }
            }
    }

}
