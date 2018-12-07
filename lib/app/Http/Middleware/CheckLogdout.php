<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckLogdout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {//nếu chưa đăng nhập thì chuyển qua
        if(Auth::guest()){
            return redirect()->intended('admin/login');
        }
        return $next($request);
    }//làm xong thì qua bật Kernel lên để sửa trong file
}
