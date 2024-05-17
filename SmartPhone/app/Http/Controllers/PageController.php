<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Slide;


class PageController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all();
        //$new_product = Product::where('id_type', 1);
        $new_product = Product::where('id_type', 1)->paginate(8);
        $sanpham_khuyenmai = Product::where('promotion_price', '<>', 0)->paginate(8);
   
      
        return view('page.trangchu', compact('slide', 'new_product', 'sanpham_khuyenmai'));
    }

    public function getLoaiSp(){
        return view('page.loai_sanpham');
    }
    public function getChitiet(Request $req){
        $sanpham = Product::where('id', $req->id)->first();
        if ($sanpham === null) {
            // Xử lý khi không tìm thấy sản phẩm, ví dụ: hiển thị thông báo lỗi hoặc chuyển hướng người dùng đến trang khác
            abort(404);
        }
        
        return view('page.chitiet_sanpham', compact('sanpham'));
    }

    public function getLienhe(){
        return view('page.lienhe');
    }
    public function getGioiThieu(){
        return view('page.gioithieu');
    }
}
