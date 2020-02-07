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
       
       if($this->hasTooManyLoginAttempts($request))
        {
            $this->fireLockoutEvent($request);
            return redirect()->back()->with([
                "expired" => $this->decayMinutes * 60
            ]);
        }
        else
        {
           $this->incrementLoginAttempts($request);
            $phone = $request->phone;
            $password = $request->password;
            if(Auth::attempt(['phone' => $phone, 'password' => $password],$request->remember))
            {
            //  Auth::logoutOtherDevices(Auth::user()->password);
            //   dd(Auth::user()->active==0);
               if (Auth::user()->active==0) 
                {
                    Auth()->logout();
                    return redirect('login')->with('danger', 'You need to verify the account.');
                }
                return redirect('kids-now');
            }
            else
            {
                return  redirect()->back()->with("danger","Phone or password false !")->withInput();
            }
        }
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
            // return redirect('login')->with('thongbao','Changer password success !');
            return redirect()->back()->with('success','Changer password success !');
            }
        else 
            {
                return redirect()->back()->with('danger','Password old false !');
            }
    }



    

}
