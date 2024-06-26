@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Checkout</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Checkout</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-6">
						<h4>Thông tin khách hàng</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="your_first_name">Họ tên*</label>
							<input type="text" id="name" name="full_name" required placeholder="Nhập họ và tên">
						</div >
                        <div class="form-block">
                            <label for="your_first_name">Giới tính</label>
                            <input type="radio" name="gender" value="Nam" checked="checked" style="width: 10%"><span style="padding-right:80px">Nam</span>
                            <input type="radio" name="gender" value="Nữ" checked="checked" style="width: 10%"><span>Nữ</span>
                        </div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" id="address" name="address"  placeholder="Street Address" required>
							
						</div>

						
						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" name="email" required placeholder="example@gmail.com" >
						</div>

						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" name="phone" required>
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea id="notes"></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body">
								<div class="your-order-item">
									<div>
                                    @if(Session::has('cart'))
                                    @foreach($product_cart as $cart)
									<!--  one item	 -->
										<div class="media">
											<img width="35%" src="source/image/product/{{$cart['item']['image']}}" alt="" class="pull-left">
											<div class="media-body">
												<p class="font-large">{{$cart['item']['name']}}</p>
												
												<span class="color-gray your-order-info">Số lượng: {{$cart['qty']}}</span>
												<span class="color-gray your-order-info">Đơn giá:  {{number_format($cart['price']/$cart['qty'])}} đồng</span>
											</div> 
										</div>
									<!-- end one item -->
                                    @endforeach
                                    @endif
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">@if(Session::has('cart')){{number_format($totalPrice)}}@else 0 @endif đồng</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán trực tiếp</label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Giao hàng đến rồi thanh toán tiền cho nhân viên giao hàng
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản</label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chủ tài khoản: NGUYEN THANH HUNG<br>
                                            STK: 9345781317<br>
                                            Ngân hàng Vietcombank (VCB)
										</div>						
									</li>
									
									
								</ul>
							</div>

							<div class="text-center"><button type="submit" class="beta-btn primary" href="#">Checkout <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection