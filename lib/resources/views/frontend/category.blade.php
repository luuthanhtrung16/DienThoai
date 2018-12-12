@extends('frontend.master')
@section('title','Chi tiết sản phẩm')
@section('main')
<link rel="stylesheet" href="css/category.css">

<div id="wrap-inner">
	<div class="products">
		<h3>{{$catename->cate_name}}</h3>
		<div class="product-list row">
			@foreach($danhmuc as $dm)
			<div class="product-item col-md-3 col-sm-6 col-xs-12">
				<a href="{{asset('detail/'.$dm->prod_id.'/'.$dm->prod_slug.'.html')}}"><img src="{{asset('lib/storage/app/avatar/'.$dm->prod_img)}}" height="150" class="img-thumbnail"></a>
				<p><a href="{{asset('detail/'.$dm->prod_id.'/'.$dm->prod_slug.'.html')}}">{{$dm->prod_name}}</a></p>
				<p class="price">{{number_format($dm->prod_price,0,',','.')}} VNĐ</p>	  
				<div class="marsk">
					<a href="{{asset('detail/'.$dm->prod_id.'/'.$dm->prod_slug.'.html')}}">Xem chi tiết</a>
				</div>                                    
			</div>
			@endforeach
		</div>                	                	
	</div>

	<div id="pagination">
		{{$danhmuc->links()}}
	</div>
</div>
@stop