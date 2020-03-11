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

Route::get('/', function () {
    return view('customer.customer_list');
});

Route::group(['prefix'=>'/'],function(){
    Route::group(['prefix'=>'/san-pham'],function(){
        Route::get('/danh-sach','ProductController@index')->name('product.index');
    });

    Route::group(['prefix'=>'/nong-ho'],function(){
        Route::get('/danh-sach','CustomerController@index')->name('customer.index');
        Route::get('/chi-tiet','CustomerController@detail')->name('customer.detail');
    });

    Route::group(['prefix'=>'/cong-no'],function(){
        Route::get('/danh-sach','OrderController@loan_list')->name('loan.list');
        Route::get('/nong-ho','OrderController@loan_customer')->name('loan.customer');
        Route::get('/chi-tiet','OrderController@loan_detail')->name('loan.detail');
    });

    Route::group(['prefix'=>'/don-hang'],function(){
        Route::get('/them-moi','OrderController@order_add')->name('order.add');
        Route::get('/chi-tiet','OrderController@order_detail')->name('order.detail');
        Route::get('/khach-hang','OrderController@order_by_customer')->name('order.customer');
    });

    Route::group(['prefix'=>'/bao-cao'],function(){
        Route::get('/danh-sach','CustomerController@index')->name('customer.index');
        Route::get('/chi-tiet','CustomerController@detail')->name('customer.detail');
    });
});
