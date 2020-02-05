<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\DemoAccountRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\staff\StaffProfiles;
use Mail;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function getIndex()
    {
        return view('pages.introduce.introduce-kid_now');
    }

    // tai khoan demo
    public function getDemoAccount()
    {
        return view('pages.introduce.demo');
    }
    public function postDemoAccount(DemoAccountRequest $request)
    {
        $staff= new StaffProfiles;
        $staff->first_name = $request->first_name;
        $staff->email = $request->email;
        $staff->phone = $request->phone;
        $staff->password = bcrypt($request->password);
        $staff->active =0;
        $staff->level =0;
        $staff->save();

        $email = $staff->email;
        $code = bcrypt(time().$email);
        $url = route('user.verify.account',['id'=>$staff->id,'code'=>$code]);
        $staff->code_active =$code;
        $staff->time_active =Carbon::now();
        $staff->save();
        $data=[
            'route' => $url
        ] ;

        Mail::send('pages.introduce.verify', $data, function($message) use ($email){
            $message->to($email, 'Verify Account')->subject('Link Verify Account !');
        });
        return redirect('/')->with('thongbao','Registration successful please login email to confirm your account !');
    }

    //xac nhan tai khoan
    public function verifyAccount(request $request)
    {
        $code = $request->code;
        $id = $request->id;
        $staff=StaffProfiles::where([
            'code_active'=>$code,
            'id'=>$id])->first();
            if(!$staff)
            {
                return redirect()->back()->with('thongbao','Link verify false !');
            }
        $staff->active=1;
        $staff->save();
        return redirect('/')->with('thongbao','Verify account success !');
    }

}
