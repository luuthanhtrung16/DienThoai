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
    	$request->img->storeAs('avatar',$filename);//Lưu hình ảnh vào thư muc lib/storage/app/....
    	return redirect('admin/admin/product/');
    }

    public function getProdEdit($id){
    	$data['product'] = Product::find($id);
    	$data['listcate'] = Category::all();
    	return view('backend.editproduct',$data);
    }
    public function postProdEdit(Request $request,$id){
    	$product = Product::find($id);
    	// $filename = $request->img->getClientOriginalName();
    	// $product = new Product;
    	$product->prod_name=$request->name;
    	$product->prod_slug = str_slug($request->name);
    	// $product->prod_img = $filename;
    	$product->prod_accessories = $request->accessories;
    	$product->prod_price = $request->price;
    	$product->prod_warranty=$request->warranty;
    	$product->prod_promotion = $request->promotion;
    	$product->prod_condition = $request->condition;
    	$product->prod_status = $request->status;
    	$product->prod_description = $request->description;
    	$product->prod_cate = $request->cate;
    	$product->prod_featured = $request->featured;
    	
    	// $request->img->storeAs('avatar',$filename);//Lưu hình ảnh vào thư muc lib/storage/app/....
    	if($request->hasFile('img')){
    		$img = $request->img->getClientOriginalName();
    		// if($product->prod_img!=''){
    		// 	unlink("lib/storage/app/avatar/".$product->prod_img);
    		// }
    		$product->prod_img= $img;
    		$request->img->storeAs('avatar',$img); 

    	}
    	// else
    	// {
    	// 	// $product->prod_img = ;
    	// }
    	$product->save();
    	return redirect('admin/admin/product/edit/'.$id);
    }
    public function getProdDelete($id){
    	$prod = Product::find($id);
    	unlink("lib/storage/app/avatar/".$prod->prod_img);
    	Product::destroy($id);

    	return redirect('admin/admin/product');
    }
    
    
}
