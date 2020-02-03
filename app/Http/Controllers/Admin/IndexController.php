<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function getIndex()
    {
        return view('pages.introduce.introduce-kid_now');
    }
    public function getDemoAccount()
    {
        return view('pages.introduce.demo');
    }
}
