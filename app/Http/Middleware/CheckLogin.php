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
            // && Auth::user()->time_expire > now() kiểm tra đăng nhập 15 ngày
            return $next($request);
        }else{
            
            return redirect('login');
        }
        
    }
}
