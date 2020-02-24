<?php

namespace App\Http\Controllers\Api\Parent;

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
     /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        //\$this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginParent(Request $request)
    {
        $input = $request->only(['main_phone', 'password']);
        $token = null;
            $rule = [
                'main_phone' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|size:10',
                'password' => 'required|min:8|max:30'
            ];
            $vadidate = Validator::make($input, $rule);
            if($vadidate->fails())
            {   
                return response()->json($vadidate->errors()->toArray(), 201);
            }
            else
            {
                try {
                    if (!$token = JWTAuth::attempt($input, $request->remember)) {
                     return response()->json(['invalid_phone_or_password'], 422);
                    }
                 } catch (JWTAuthException $e) {
                     return response()->json(['failed_to_create_token'], 500);
                 }
                return response()->json([
                    'token' => $token,
                ], 200);
            }

    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('admin')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
         $token = auth::guard('admin')->refresh();
         return response()->json(
             ['token' => $token]
            );
        // return $this->respondWithToken(auth('admin')->refresh());
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
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
