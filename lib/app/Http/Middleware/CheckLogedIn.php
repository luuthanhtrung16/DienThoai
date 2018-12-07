<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckLogedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {//Nếu đăng nhập rồi thì chuyển qua trang index
        if(Auth::check()){
            return redirect()->intended('admin/admin/home');
        }
        return $next($request);
    }
}
