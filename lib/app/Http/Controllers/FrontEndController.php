<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
class FrontEndController extends Controller
{
    public function getHome(){
    	// $data['category'] = Category::all();//Đáng lẻ là dùng ni cũng được nhưng hấn chỉ trỏ tới 1 cái getHOem thôi, nên dô App providers AppServerProvei để dùng share cho tất cả các trang
    	$data['sanphamdb'] = Product::where('prod_featured',1)->orderBy('prod_id','desc')->take(8)->get();
    	$data['sanphammoi'] = Product::orderBy('prod_id','desc')->take(8)->get();
    	return view('frontend.home',$data);
    }
    public function getDetail($id){
    	$data['item'] = Product::find($id);
    	return view('frontend.details',$data);
    }
}
