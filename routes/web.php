<?php

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

Route::get('/dang-nhap','UserController@login')->name('login');
Route::post('/dang-nhap','UserController@post_login')->name('login');

Route::group(['prefix'=>'/','middleware'=>'auth'],function(){
    Route::get('/dang-xuat','UserController@logout')->name('logout');

    Route::get('/','CustomerController@index')->name('home');
    Route::get('/trang-chu','CustomerController@index')->name('home');
    
    Route::group(['prefix'=>'/gio-hang'],function(){
        Route::post('/them','CartController@post_add')->name('cart.add');
        Route::get('/xoa/{id}','CartController@remove')->name('cart.remove');
        Route::get('/huy','CartController@clear')->name('cart.clear');
    });

    Route::group(['prefix'=>'cong-no'],function(){
        Route::get('danh-sach-khach-hang','LiabilityController@list')->name('liabilities.list_customer');
        Route::get('don-chua-thanh-toan','LiabilityController@orderList')->name('liabilities.list_unpaid');
        Route::get('chi-tiet-don-chua-thanh-toan','LiabilityController@detail')->name('liabilities.detail_unpaid');
        Route::get('don-da-thanh-toan','LiabilityController@list')->name('liabilities.list_paid');
        Route::get('chi-tiet-don-da-thanh-toan','LiabilityController@list')->name('liabilities.detail_paid');
    });

    Route::group(['prefix'=>'/nong-ho'],function(){
        Route::get('/danh-sach','CustomerController@index')->name('customer.list');
        Route::post('/them-moi','CustomerController@post_add')->name('customer.add');
        Route::post('/chinh-sua','CustomerController@post_edit')->name('customer.edit');
    });

    Route::group(['prefix'=>'/cac-loai-che'],function(){
        Route::get('/danh-sach','ProductController@index')->name('product.list');
        Route::post('/tao-moi','ProductController@post_add')->name('product.add');
        Route::post('/chinh-sua','ProductController@post_edit')->name('product.edit');
    });

    Route::group(['prefix'=>'/don-hang'],function(){
        Route::group(['prefix'=>'/tao-moi'],function(){
            Route::get('/khach-hang-moi','OrderController@add_with_new_customer')->name('order.add.new_customer');
            Route::post('/khach-hang-moi','OrderController@post_add_with_new_customer')->name('order.add.new_customer');
        });
        Route::get('/list-order-save','OrderController@list_order_save')->name('order.list_order_save');
        Route::get('/list-order-save-change','OrderController@list_order_save_change')->name('order.list_order_save_change');
    });
});
