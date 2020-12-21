<?php

namespace App\Http\Middleware;


use Auth;
use Closure;
class CheckAdmin
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
        if (Auth::check()) {
            if(Auth::user()->role_id == 1 || Auth::user()->role_id ==2){ //Kiểm tra có phải admin hay k ???
                return $next($request);
            }
            else{
                return redirect('login');
            }
        } else {
            return redirect('login');
        }
    }
}

