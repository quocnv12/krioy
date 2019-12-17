<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public  function GetLogin() 
    {
        return view('pages.addmin-login.login');
    }

    public  function PostLogin(LoginRequest $request) 
    {
        $phone=$request->phone;
        $password=$request->password;
        if( Auth::attempt(['phone' => $phone, 'password' => $password]))
                {
                    return redirect('kids-now');
                }
            else
                {
                    return  redirect()->back()->with("thongbao","Tài khoản hoặc mật khẩu không chính xác !")->withInput();
                }
    }

    public function Logout()
    {
        Auth::logout();
        return redirect('login');
    }


}
