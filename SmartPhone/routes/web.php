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


Route::get('chi-tiet-san-pham', 'App\Http\Controllers\PageController@getChitiet')->name('chitietsanpham');

Route::get('lien-he', 'App\Http\Controllers\PageController@getLienhe')->name('lienhe');
Route::get('gioi-thieu', 'App\Http\Controllers\PageController@getGioiThieu')->name('gioithieu');


Route::get('/', function () {
    return view('welcome');
});