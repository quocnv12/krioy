<?php

namespace App\Http\Controllers\Api\Parent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Validator;
use App\models\staff\StaffProfiles;
use Mail;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{

    //đổi mật khẩu
    public function postUpdatePassword(request $request)
    {
        $rules =  
            [
                'password_old'=>'required',
                'password'=>'required|min:8|max:30',
                'password_confirmation'=>'required|same:password'
            ];
        $validator = Validator::make($request->all(), $rules,[
                'password_old.required'=>'Please enter password old !',
                'password.required'=>'Please enter password new !',
                'password.min'=>'Password from 8 to 30 characters !',
                'password.max'=>'Password from 8 to 30 characters !',
                'password_confirmation.required'=>'Please enter confirm password new !',
                'password_confirmation.same'=>'Password entered does not match !'
        ]);
        if($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        if (Hash::check($request->password_old, Auth::user()->password))
            {
                Auth::user()->update([
                'password' => bcrypt($request->password)
            ]);
            // return redirect('login')->with('thongbao','Changer password success !');
                 return response()->json(['massage' => "Changer Password Success !"], 200);
            }
        else 
            {
                return response()->json(['massage' => "Password old false !"], 200);
               // return redirect()->back()->with('danger','Password old false !');
            }
    }
}
