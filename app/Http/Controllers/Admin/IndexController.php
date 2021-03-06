<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\DemoAccountRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\staff\StaffProfiles;
use Mail;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    //-------------trang home
    public function getHome()
    {
        return view('pages.home');
    }

    //--------------trang intro
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
        $staff->gender =2;
        $staff->level =0;
        //dăng nhập 15 ngày thêm trường time_expire 
        //$staff->time_expire = now()->addDays(15);
        $staff->save();
        DB::table('staff_roles')->insert([
            ['id_staff' => $staff->id,'id_role' => 1]
        ]);
        $email = $staff->email;
        $code = bcrypt(time().$email);
        $url = route('user.verify.account',['id'=>$staff->id,'code'=>$code]);
        $staff->code_active =$code;
        $staff->time_active =Carbon::now();
        $staff->save();
        $data=[
            'route' => $url,
        ] ;

        Mail::send('pages.introduce.verify', $data, function($message) use ($email){
            $message->to($email, 'Verify Account')->subject('Link Verify Account !');
        });
        if (\Lang::locale() == 'en') {
            return redirect()->back()->with('success','Registration successful please login email to confirm your account !');
        }
        if (\Lang::locale() == 'vi') {
            return redirect()->back()->with('success','Đăng ký thành công, vui lòng đăng nhập email để kích hoạt tài khoản !');
        }
        
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
                if (\Lang::locale() == 'en') {
                    return redirect()->back()->with('danger','Link verify false !');
                }
                if (\Lang::locale() == 'vi') {
                    return redirect()->back()->with('danger','Link kích hoạt sai !');
                }
               
            }
        $staff->active=1;
        $staff->save();

        if(Auth::loginUsingId($staff->id))
        {
            if (\Lang::locale() == 'en') {
                return redirect('kids-now')->with('success','Verify success !');
            }
            if (\Lang::locale() == 'vi') {
                return redirect('kids-now')->with('success','Kích hoạt tài khoản thành công !');
            }
           
        }
    }

}
