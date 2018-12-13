<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Comment;

class FrontEndController extends Controller
{
    public function getHome(){
    	// $data['category'] = Category::all();//Đáng lẻ là dùng ni cũng được nhưng hấn chỉ trỏ tới 1 cái getHOem thôi, nên dô App providers AppServerProvei để dùng share cho tất cả các trang
    	$data['sanphamdb'] = Product::where('prod_featured',1)->orderBy('prod_id','desc')->take(8)->get();
    	$data['sanphammoi'] = Product::orderBy('prod_id','desc')->take(8)->get();
    	return view('frontend.home',$data);
    }
    public function getDetail($id){
        $data['comments'] = Comment::where('com_product',$id)->get();
    	$data['item'] = Product::find($id);
    	return view('frontend.details',$data);
    }
    public function getCategory($id){
        $data['catename'] = Category::find($id);
        $data['danhmuc'] = Product::where('prod_cate',$id)->orderBy('prod_id','desc')->paginate(8);
        return view('frontend.category',$data);
    }
    public function postComment(Request $req,$id){
        $com = new Comment;
        $com->com_name= $req->name;
        $com->com_email = $req->email;
        $com->com_content = $req->content;
        $com->com_product = $id;
        $com->save();
        return back();
    }
    public function getSearch(Request $req){
       $result= $req->text;
       $result = str_replace(' ', '%',$result);
       $data['keyword'] = $result;
       $data['items'] = Product::where('prod_name','like','%'.$result.'%')->get();
       return view('frontend.search',$data);
    }
    // Laravel Shopping Cart
    //composer require "darryldecode/cart:~4.0"
    //Darryldecode\Cart\CartServiceProvider::class
    // 'Cart' => Darryldecode\Cart\Facades\CartFacade::class
    //php artisan vendor:publish --provider="Darryldecode\Cart\CartServiceProvider" --tag="config"
}
