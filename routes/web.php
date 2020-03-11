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

    Route::get('/cac-loai-che','ProductController@index')->name('product.list');
    Route::post('/cac-loai-che/tao-moi','ProductController@post_add')->name('product.add');
    Route::post('/cac-loai-che/chinh-sua','ProductController@post_edit')->name('product.edit');
});
