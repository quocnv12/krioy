<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public  function GetLogin() 
    {
        return view('pages.addmin-login.login');
    }
}
