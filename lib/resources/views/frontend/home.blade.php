@extends('frontend.master')
@section('title','Trang chủ')
@section('main')
<div id="wrap-inner">
	<div class="products">
		<h3>sản phẩm nổi bật</h3>
		<div class="product-list row">
			@foreach($sanphamdb as $db)
			<div class="product-item col-md-3 col-sm-6 col-xs-12">
				<a href="#"><img src="{{asset('lib/storage/app/avatar/'.$db->prod_img)}}" height="150" class="img-thumbnail"></a>
				<p><a href="#">{{$db->prod_name}}</a></p>
				<p class="price">{{number_format($db->prod_price,0,',','.')}} VNĐ</p>	  
				<div class="marsk">
					<a href="{{asset('detail/'.$db->prod_id.'/'.$db->prod_slug.'.html')}}">Xem chi tiết</a>
				</div>                                    
			</div>
			@endforeach
		</div>                	                	
	</div>

	<div class="products">
		<h3>sản phẩm mới</h3>
		<div class="product-list row">
			@foreach($sanphammoi as $spnew)
			<div class="product-item col-md-3 col-sm-6 col-xs-12">
				<a href="#"><img src="{{asset('lib/storage/app/avatar/'.$spnew->prod_img)}}" height="150" class="img-thumbnail"></a>
				<p><a href="#">{{$spnew->prod_name}}</a></p>
				<p class="price">{{number_format($spnew->prod_price,0,',','.')}} VNĐ</p>	  
				<div class="marsk">
					<a href="{{asset('detail/'.$spnew->prod_id.'/'.$spnew->prod_slug.'.html')}}">Xem chi tiết</a>
				</div>                                    
			</div>
			@endforeach

		</div>    
	</div>
</div>
@stop
