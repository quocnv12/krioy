<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Response;
use JWTAuthException;
use Hash;


class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['login']);
    }
    public function login(request $request)
    {
        $input = $request->only(['phone', 'password']);
       $token = null;
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
                try {
                    if (!$token = JWTAuth::attempt($input)) {
                     return response()->json(['invalid_email_or_password'], 422);
                    }
                 } catch (JWTAuthException $e) {
                     return response()->json(['failed_to_create_token'], 500);
                 }
                return response()->json([
                    'token' => $token,
                ], 200);
            }

    }


    public function logout(request $request)
    {
        $this->guard()->logout();
        return redirect('');
    }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard('api');
    }
    
}
