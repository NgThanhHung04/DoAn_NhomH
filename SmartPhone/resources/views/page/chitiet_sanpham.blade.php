@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
			@if(isset($sanpham))
				<h6 class="inner-title">{{$sanpham->name}}</h6>
			@endif
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Thông tin chi tiết sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
					<!-- @if(isset($sanpham) && isset($sanpham->name)) -->
						<div class="col-sm-4">
							<img src="source/image/product/{{$sanpham->image}}" alt="">
						</div>
					<!-- @endif -->
						<div class="col-sm-8">
							<div class="single-item-body">
							<!-- @if(isset($sanpham) && isset($sanpham->image)) -->
								<p class="single-item-title">{{$sanpham->name}}</p>
							<!-- @endif
							@if(isset($sanpham)) -->
							<p class="single-item-price">
								@if($sanpham->promotion_price == 0)
									<span class="flash-sale">{{number_format($sanpham->unit_price)}} đồng</span>
								@else
									<span class="flash-del">{{number_format($sanpham->unit_price)}} đồng</span>
									<span class="flash-sale">{{number_format($sanpham->promotion_price)}} đồng</span>
								@endif
							</p>
						<!-- @endif -->
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
							<!-- @if(isset($sanpham) && isset($sanpham->description)) -->
								<p>{{$sanpham->description}}</p>
							<!-- @endif -->
							</div>
							<div class="space20">&nbsp;</div>

							<p>Số lượng:</p>
							<div class="single-item-options">
								
								<select class="wc-select" name="color">
									<option>Số lượng</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả</a></li>
						</ul>

						<div class="panel" id="tab-description">
						<p>{{$sanpham->description}}</p>
						</div>
						
					</div>
					<div class="space50">&nbsp;</div>
				</div>
				
			</div>
		</div>
	</div> 
    @endsection