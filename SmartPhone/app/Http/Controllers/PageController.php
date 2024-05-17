<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Slide;


class PageController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all();
        $new_product = Product::where('id_type', 1)->paginate(8);
        $sanpham_khuyenmai = Product::where('promotion_price', '<>', 0)->paginate(8);
   
      
        return view('page.trangchu', compact('slide', 'new_product', 'sanpham_khuyenmai'));
    }

    public function getChitiet(Request $req){
        $sanpham = Product::where('id', $req->id)->first();
        
        
        return view('page.chitiet_sanpham', compact('sanpham'));
    }


}
