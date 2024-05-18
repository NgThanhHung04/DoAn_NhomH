<?php
 use Illuminate\Http\Request;

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('index', 'App\Http\Controllers\PageController@getIndex')->name('trang-chu');

Route::get('loai-san-pham/{type}', 'App\Http\Controllers\PageController@getLoaiSp')->name('loaisanpham');

Route::get('chi-tiet-san-pham/{id}', 'App\Http\Controllers\PageController@getChitiet')->name('chitietsanpham');

Route::get('lien-he', 'App\Http\Controllers\PageController@getLienhe')->name('lienhe');
Route::get('gioi-thieu', 'App\Http\Controllers\PageController@getGioiThieu')->name('gioithieu');

//Them gio hang
Route::get('add-to-cart/{id}', 'App\Http\Controllers\PageController@getAddToCart')->name('themgiohang');
//xoa gio hang
Route::get('del-cart/{id}','App\Http\Controllers\PageController@getDelItemCart')->name('xoagiohang');

// Route::get('dang-nhap','App\Http\Controllers\PageController@getLogin')->name('dangnhap'); 
// Route::post('dang-nhap','App\Http\Controllers\PageController@postLogin')->name('dangki');

Route::get('dang-ki','App\Http\Controllers\PageController@getRegister')->name('dangki'); 
Route::post('dang-ki','App\Http\Controllers\PageController@postRegister')->name('dangki');

Route::get('dang-nhap', [PageController::class, 'indexLogin'])->name('dangnhap');
Route::post('dang-nhap', [PageController::class, 'customLogin'])->name('dangnhap');

Route::get('dang-xuat', [PageController::class, 'signOut'])->name('dangxuat');

//dat hang
Route::get('dat-hang','App\Http\Controllers\PageController@getCheckout')->name('dathang'); 
Route::post('dat-hang','App\Http\Controllers\PageController@postCheckout')->name('dathang'); 

//tim kiếm
Route::get('search','App\Http\Controllers\PageController@getSearch')->name('search'); 


Route::get('/', function () {
    return view('welcome');
});