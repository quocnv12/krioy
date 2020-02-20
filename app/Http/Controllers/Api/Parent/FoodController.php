<?php

namespace App\Http\Controllers\Api\Parent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodController extends Controller
{
    protected $user;
    public function __contruct()
    {
        //$this->user = JWTAuth::parseToken()->authenticate();
       // $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function getme(request $request)
    {
       return response()->json(['token'=>'loi roi'], 200,);
    }
}
