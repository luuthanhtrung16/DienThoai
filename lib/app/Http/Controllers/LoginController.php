<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function getLogin(){
    	return view('backend.login');
    }
    public function postLogin(Request $request){
    	//tham số true là sẽ lưu đăng nhập, còn false là ko
    	if($request->remember ="Remember Me"){
    		$remember = true;
    	}else{
    		$remember=false;
    	}
    	if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],$remember)){
    		return redirect()->intended('admin/admin/home');//chuyển qua cái rout admin/home đmmm rắc rối
    	}else{
    		return back()->with('error','Tài khoản hoặc mật khẩu chưa chính xác');	
    	}
    }
    public function getLogout(){
    	Auth::logout();
    	return redirect()->intended('admin/login');
    }
}
