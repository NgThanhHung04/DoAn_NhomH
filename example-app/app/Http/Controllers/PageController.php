<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\Models\Slide;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\ProductType;
use Session;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    
    public function getIndex()
    {
        $slide = Slide::all();
        $new_product = Product::where('id_type', 1)->paginate(8);
        $sanpham_khuyenmai = Product::where('promotion_price', '<>', 0)->paginate(8);
   
      
        return view('page.trangchu', compact('slide', 'new_product', 'sanpham_khuyenmai'));
       
    }
    
    public function getLoaiSp($type)
    {
        //$sp_theoloai = Product::all();
        $sp_theoloai = Product::where('id_type', $type )->get();
        $sp_khac = Product::where('id_type', '<>', $type)->paginate(3);
        $loai = ProductType::all();
        $loai_sp = ProductType::where('id', $type)->first();  
        
        return view('page.loai_sanpham', compact('sp_theoloai', 'sp_khac', 'loai', 'loai_sp'));
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
    public function getProfile(){
        return view('page.profile');
    }

    public function getLogin(){
        return view('page.dangnhap');
    }

    public function getRegister(){
        return view('page.dangki');
    }
    
    //Đăng ký
    public function postRegister(Request $req){
        $this->validate($req, [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:20',
            'fullname' => 'required',
            'phone' => 'required|max:10',
            'address' => 'required|max:150',
            're_password' => 'required|same:password'
        ], [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Không đúng định dạng email',
            'email.unique' => 'Email đã có người sử dụng',
            'password.required' => 'Vui lòng nhập password',
            're_password.same' => 'Mật khẩu không giống nhau',
            'password.min' => 'Mật khẩu ít nhất có 6 kí tự',
            'phone.required' => 'Vui lòng nhập phone',
            'address.required' => 'Vui lòng nhập address',
        ]);
    
        $user = new User();
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->passwork);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
    
        return redirect()->back()->with('thanhcong', 'Tạo tài khoản thành công!!!');
    }

    //Đăng nhập
    public function indexLogin()
    {
        return view('page.dangnhap');
    }
    public function customLogin(Request $request)
    {
        
	$request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('trangchu')
                        ->withSuccess('Signed in');
        }
        return redirect("index")->withSuccess('Login details are not valid');
    }

    public function signOut() {
        Session::flush();
        Auth::dangxuat();

        return Redirect('dangnhap');
    }

    //Tìm kiếm
    public function getSearch(Request $req){
        $product = Product::where('name','like','%'.$req->key.'%')
                            ->orWhere('unit_price',$req->key)
                            ->get();
        
        return view('page.search', compact('product'));
    }

    //dathang
    public function getCheckout(){
        if(Session('cart')){
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            //dd($cart)
            return view('page.dat_hang', ['product_cart'=>$cart->items, 
            'totalPrice'=>$cart->totalPrice, 'totalQty'=>$cart->totalQty]);
        }else{
            return view('page.dat_hang');
        }
       
    }

    public function postCheckout(Request $req){

        $cart  = Session::get('cart');

        $customer = new Customer;
        $customer -> name = $req->full_name;
        $customer -> gender = $req -> gender;
        $customer-> email = $req->email;
        $customer-> address = $req->address;
        $customer-> phone_number = $req->phone;
        $customer-> note = $req->notes;
        $customer-> save();


        $bill = new Bill;
        $bill->id_customer = $customer ->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req ->payment_method;
        $bill->note = $req->notes;
        $bill-> save();

        
        foreach($cart->items as $key->$value){
            $bill_detail = new BillDeatil;
            $bill_detail ->id_bill = $bill->id;
            $bill_detail->id_product = $key; //$value['item']['id'];
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = $value['price']/$value['qty'];

            $bill_detail->save();

        }

        Session::forget('cart');
        return redirect()->back()->with('thongbao', 'Đặt hàng thành công!!');
        
    }
   
}
