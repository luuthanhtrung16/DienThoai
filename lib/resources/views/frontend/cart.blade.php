@extends('frontend.master')
@section('title','Giỏ hàng')
@section('main')
<link rel="stylesheet" href="css/cart.css">
<script type="text/javascript">
	function updateCart(qty,id){
		//dùng ajax
		$.get(
			"{{asset('cart/update')}}",//đường dẫn ajax gửi lên trên
			{quantity:qty, id:id},//dữ liệu ajax gửi sang laravel hứng dữ liệu để xử lý
			function(){
				location.reload();
			}//sẽ tải lại trang
			);
	}
</script>
<div id="wrap-inner">
	<div id="list-cart">
		<h3>Giỏ hàng</h3>
		@if(Cart::getContent()->count()>=1)
		<form>
			<table class="table table-bordered .table-responsive text-center">
				<tr class="active">
					<td width="11.111%">Ảnh mô tả</td>
					<td width="22.222%">Tên sản phẩm</td>
					<td width="22.222%">Số lượng</td>
					<td width="16.6665%">Đơn giá</td>
					<td width="16.6665%">Thành tiền</td>
					<td width="11.112%">Xóa</td>
				</tr>
				@foreach($item as $it)
				<tr>
					<td><img class="img-responsive" src="{{asset('lib/storage/app/avatar/'.$it->attributes->img)}}" width="200"></td>
					<td>{{$it->name}}</td>
					<td>
						<div class="form-group">
							<input class="form-control" type="number" value="{{$it->quantity}}" onchange="updateCart(this.value,'{{$it->id}}')">
						</div>
					</td>
					<td><span class="price">{{number_format($it->price,0,',','.')}} VNĐ</span></td>
					<td><span class="price">{{number_format($it->price*$it->quantity,0,',','.')}} VNĐ</span></td>
					<td><a href="{{asset('cart/delete/'.$it->id)}}">Xóa</a></td>
				</tr>
				@endforeach
			</table>
			<div class="row" id="total-price">
				<div class="col-md-6 col-sm-12 col-xs-12">										
					Tổng thanh toán: <span class="total-price">{{number_format($total,0,',','.')}} VNĐ</span>

				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<a href="#" class="my-btn btn">Mua tiếp</a>
					<a href="#" class="my-btn btn">Cập nhật</a>
					<a href="{{asset('cart/delete/all')}}" class="my-btn btn">Xóa giỏ hàng</a>
				</div>
			</div>
		</form>             	                	
	</div>

	<div id="xac-nhan">
		<h3>Xác nhận mua hàng</h3>
		<form method="post">
			<div class="form-group">
				<label for="email">Email address:</label>
				<input required type="email" class="form-control" id="email" name="email">
			</div>
			<div class="form-group">
				<label for="name">Họ và tên:</label>
				<input required type="text" class="form-control" id="name" name="name">
			</div>
			<div class="form-group">
				<label for="phone">Số điện thoại:</label>
				<input required type="number" class="form-control" id="phone" name="phone">
			</div>
			<div class="form-group">
				<label for="add">Địa chỉ:</label>
				<input required type="text" class="form-control" id="add" name="add">
			</div>
			<div class="form-group text-right">
				<button type="submit" class="btn btn-default">Thực hiện đơn hàng</button>
			</div>
			{{csrf_field()}}
		</form>
		@else
		Giỏ hàng trống
		@endif
	</div>
</div>
@stop