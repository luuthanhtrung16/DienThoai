<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Product;
use App\Category;
use DB;
use Auth;
class ProductController extends Controller
{
    public function getProd(){
    	$data['productlist'] = DB::table('vp_products')->join('vp_categories','vp_products.prod_cate','=','vp_categories.cate_id')->orderBy('prod_id','desc')->paginate(5);
    	return view('backend.product',$data);
    }
    public function getProdAdd(){
    	$data['catelist'] = Category::all();
    	return view('backend.addproduct',$data);
    }
    
    public function postProdAdd(AddProductRequest $request){
    	$filename = $request->img->getClientOriginalName();
    	$product = new Product;
    	$product->prod_name=$request->name;
    	$product->prod_slug = str_slug($request->name);
    	$product->prod_img = $filename;
    	$product->prod_accessories = $request->accessories;
    	$product->prod_price = $request->price;
    	$product->prod_warranty=$request->warranty;
    	$product->prod_promotion = $request->promotion;
    	$product->prod_condition = $request->condition;
    	$product->prod_status = $request->status;
    	$product->prod_description = $request->description;
    	$product->prod_cate = $request->cate;
    	$product->prod_featured = $request->featured;
    	$product->save();
    	$request->img->storeAs('avatar',$filename);//Luwu anhr voo thu mucj
    	return redirect('admin/admin/product/');
    }

    public function getProdEdit(){
    	return view('backend.editproduct');
    }
    public function postProdEdit(){

    }
    public function getProdDelete($id){
    	Product::destroy($id);
    	return redirect('admin/admin/product');
    }
    
}
