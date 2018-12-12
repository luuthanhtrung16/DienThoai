@extends('frontend.master')
@section('title','Tìm kiếm sản phẩm')
@section('main')
<link rel="stylesheet" href="css/search.css">

<div id="wrap-inner">
	<div class="products">
		<h3>Tìm kiếm với từ khóa: <span>{{$keyword}}</span></h3>
		<div class="product-list row">
			@foreach($items as $db)
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

	<div id="pagination">
		
	</div>
</div>
@stop