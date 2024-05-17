<div id="header">
<div class="header-body">
    <div class="container beta-relative">
    <div class="pull-left">
        <a href="index.html" id="logo"><img src="source/assets/dest/images/logoo.png" width="150px" alt=""></a>
    </div>
    <div class="pull-right beta-components space-left ov">
        <div class="space30">&nbsp;</div>
        <!-- <div class="beta-comp">
            <form role="search" method="get" id="searchform" action="{{route('search')}}">
                <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
                <button class="fa fa-search" type="submit" id="searchsubmit"></button>
            </form>
        </div> -->
        <div class="beta-comp">
        @if(Session::has('cart'))
          
            <div class="cart">
                <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')){{Session('cart')->totalQty}}
                    @else Trống @endif) <i class="fa fa-chevron-down"></i></div>
                <div class="beta-dropdown cart-body">
                
                    @foreach($product_cart as $product)
                    <!-- Nội dung giỏ hàng -->
                    <div class="cart-item">
                        <a class="cart-item-delete" href="{{route('xoagiohang',$product['item']['id'])}}"><i class="fa fa-times"></i></a>
                        <div class="media">
                            <a class="pull-left" href="#"><img src="source/image/product/{{$product['item']['image']}}" alt=""></a>
                            <div class="media-body">
                                <span class="cart-item-title">{{$product['item']['name']}}</span>
                                <span class="cart-item-amount">{{$product['qty']}}*<span>@if($product['item']['promotion_price']==0)
                                    {{number_format($product['item']['unit_price'])}}@else  {{number_format($product['item']['promotion_price'])}}@endif </span></span>
                            </div>
                        </div>
                    </div>
                    @endforeach 
                
                    <div class="cart-caption">
                        <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">@if($product['item']['promotion_price']==0)
                                    {{number_format($product['item']['unit_price'])}}@else  {{number_format($product['item']['promotion_price'])}}@endif</span></div>
                        <div class="clearfix"></div>

                        <div class="center">
                            <div class="space10">&nbsp;</div>
                            <a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>

                </div>
            </div> <!-- .cart -->
           @endif
        </div>
        

        <div class="pull-right auto-width-right">
            <ul class="top-details menu-beta l-inline">
                @if(Auth::check())
                <li><a href="#" class="fa fa-user">{{Auth::user()->full_name}}</a></li>
                <li><a href="{{route('dangxuat')}}">Đăng Xuất</a></li>
                @else
                <li><a href="{{route('dangki')}}">Đăng kí</a></li>
                <li><a href="{{route('dangnhap')}}">Đăng nhập</a></li>
                @endif
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div> <!-- .container -->
</div> <!-- .header-body -->
<div class="header-bottom" style="background-color: #0277b8;">
    <div class="container" style="display: flex; justify-content: space-between; align-items: center;">
        <nav class="main-menu" style="flex-grow: 2;">
            <ul class="l-inline ov" style="display: flex; margin: 20px; align-items: center;">
                <li><a href="{{route('trang-chu')}}">Trang chủ</a></li>
                <li><a href="#">Loại sản phẩm</a>
                    <ul class="sub-menu">
                        @foreach($loai_sp as $loai)
                            <li><a href="{{route('loaisanpham',$loai->id)}}">{{$loai->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{route('gioithieu')}}">Giới thiệu</a></li>
                <li><a href="{{route('lienhe')}}">Liên hệ</a></li>
            </ul>
            <div class="clearfix"></div>
        </nav>
        <div class="beta-comp">
            <form role="search" method="get" id="searchform" action="{{route('search')}}" style="display: flex; align-items: center;">
                <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." style="padding: 5px; border-radius: 5px 0 0 5px; border: 1px solid #ccc; border-right: none; margin-right: -4px;" />
                <button class="fa fa-search" type="submit" id="searchsubmit" style="background-color: #f44336; color: #fff; border: none; padding: 10px 15px; border-radius: 0 5px 5px 0; margin-left: -4px;"></button>
            </form>
        </div>
    </div> <!-- .container -->
</div>


 <!-- .header-bottom -->
	</div> <!-- #header -->