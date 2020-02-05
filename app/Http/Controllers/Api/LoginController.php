<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    public function login(request $request)
    {
        $input = $request->only(['phone', 'password']);
       // $token = null;
            $rule = [
                'phone' => 'required|numeric|min:10',
                'password' => 'required|min:8'
            ];
            $vadidate = Validator::make($input, $rule);
            if($vadidate->fails())
            {   
                return response()->json($vadidate->errors()->toArray(), 201);
            }
            else
            {
                if (!($token = JWTAuth::attempt($input))) {
                        return response()->json([
                            'status' => 'error',
                            'error' => 'invalid.credentials',
                            'msg' => 'Invalid Credentials.'
                        ], 201);
                    }
                return response()->json(['token' => $token], 200);
            }

    }


    public function logout(request $request)
    {
        Auth::logout();
        return redirect('');

    
    }
}
