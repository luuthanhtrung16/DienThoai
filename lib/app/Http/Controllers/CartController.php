<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Cart;//Sử dụng Cart 
use App\Product;
use Mail;
class CartController extends Controller
{
    //
    // Laravel Shopping Cart
    //composer require "darryldecode/cart:~4.0"
    //Darryldecode\Cart\CartServiceProvider::class
    // 'Cart' => Darryldecode\Cart\Facades\CartFacade::class
    //php artisan vendor:publish --provider="Darryldecode\Cart\CartServiceProvider" --tag="config"
    //https://github.com/darryldecode/laravelshoppingcart
	public function getAdd($id){
    	// dd($id);
		$product = Product::find($id);
		Cart::add(array(
			'id' => $id,
			'name' => $product->prod_name,
			'price' => $product->prod_price,
			'quantity' => 1,
			'image'=>$product->prod_img,
			
			'attributes' => array('img'=> $product->prod_img),

		));
		 // $data = Cart::getContent();
		 // dd($data);
		return redirect('cart/show');
	}
	public function getShow(){
		//Tổng tiền Cart::getTotal()
		$data['total']=Cart::getTotal();
		$data['item'] = Cart::getContent();
		return view('frontend.cart',$data);
	}
	public function getDelete($id){
		if($id=='all'){
			Cart::clear();
		}
		else{
			Cart::remove($id);
		}
		return back();
	}
	public function getUpdate(Request $req){
		Cart::update($req->id, array('relative' => false, 
			'quantity' =>array(
				'relative' => false,
				'value' => $req->quantity
			) ,
		));
	}
	public function postEmail(Request $req){
		$data['info']= $req->all();
		$email = $req->email;
		$data['cart'] = Cart::getContent();
		$data['total'] = Cart::getTotal();
		Mail::send('frontend.email',$data,function($message) use ($email){
			$message->from('luutrungtk96@gmail.com','Lưu Trungg');
			$message->to($email,$email);
			$message->cc('luuthanhtrung16@gmail.com','Lưu Thành Trung');
			$message->subject('Xác nhận đơn mua hàng từ Lưu Trung');
		});
		Cart::clear();
		return redirect('complete');
	}
	public function getComplete(){
		return view('frontend.complete');
	}
}
