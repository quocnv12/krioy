<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            // if (Auth::user()->active==0) {
            //     Auth()->logout();
            //     return redirect('login')->with('thongbao', 'You need to verify the account.');
            // }
            return $next($request);
        }else{
            
            return redirect('login');
        }
        
    }
}
