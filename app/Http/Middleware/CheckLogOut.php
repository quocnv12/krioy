<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class CheckLogOut
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
           
            return redirect('kids-now');
        }
        else
        {
            return $next($request);
        }
       
    }
}
