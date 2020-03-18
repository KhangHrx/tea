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

    Route::group(['prefix'=>'/tai-khoan','middleware'=>'can:admin'],function(){
        Route::get('/','UserController@index')->name('user.index');
        Route::get('/xoa/{id}','UserController@delete')->name('user.delete');
        Route::get('/reset-mat-khau/{id}','UserController@reset_password')->name('user.reset_password');
        Route::post('/them','UserController@insert')->name('user.insert');
    });

    Route::get('/','CustomerController@index')->name('home');
    Route::get('/trang-chu','CustomerController@index')->name('home');
    
    Route::get('/doi-mat-khau','UserController@change_password')->name('change_password');
    Route::post('/doi-mat-khau','UserController@post_change_password')->name('change_password');

    Route::group(['prefix'=>'/gio-hang'],function(){
        Route::post('/them','CartController@post_add')->name('cart.add');
        Route::get('/xoa/{id}','CartController@remove')->name('cart.remove');
        Route::get('/huy','CartController@clear')->name('cart.clear');
    });
    //--------------------Thanh toán--------------------
    Route::group(['prefix'=>'thanh-toan'],function(){
        Route::get('danh-sach-khach-hang','PayController@list')->name('pays.list_customer');
        Route::get('don-chua-thanh-toan/{id}','PayController@unpaidList')->name('pays.unpaid_list');
        Route::post('don-chua-thanh-toan/{id}','PayController@postPayOrder')->name('pays.unpaid_list');

        Route::get('chi-tiet-don-chua-thanh-toan/{id}','PayController@unpaidDetail')->name('pays.detail_unpaid');
        Route::post('chi-tiet-don-chua-thanh-toan/{id}','PayController@postPayUnpaid')->name('pays.pay_unpaid');

        Route::get('danh-sach-da-thanh-toan','PayController@customerPaidList')->name('pays.customer_paid_list');
        Route::get('da-thanh-toan/{id}','PayController@paidList')->name('pays.paid_List');
        Route::get('chi-tiet-da-thanh-toan/{id}','PayController@detaiPaidlList')->name('pays.detail_paid');
    });
    //---------------------Công nợ------------------------
    Route::group(['prefix'=>'cong-no','middleware'=>'can:accountant'],function(){
        Route::get('danh-sach-khach-hang','LiabilityController@list')->name('liabilities.list_customer');
        Route::get('don-chua-thanh-toan/{id}','LiabilityController@unpaidList')->name('liabilities.unpaid_list');
        Route::post('don-chua-thanh-toan/{id}','LiabilityController@postPayOrder')->name('liabilities.unpaid_list');

        Route::get('chi-tiet-don-chua-thanh-toan/{id}','LiabilityController@unpaidDetail')->name('liabilities.detail_unpaid');
        Route::post('chi-tiet-don-chua-thanh-toan/{id}','LiabilityController@postPayUnpaid')->name('liabilities.pay_unpaid');

        Route::get('danh-sach-da-thanh-toan','LiabilityController@customerPaidList')->name('liabilities.customer_paid_list');
        Route::get('da-thanh-toan/{id}','LiabilityController@paidList')->name('liabilities.paid_List');
        Route::get('chi-tiet-da-thanh-toan/{id}','LiabilityController@detaiPaidlList')->name('liabilities.detail_paid');
    });

    Route::group(['prefix'=>'/nong-ho'],function(){
        Route::get('/danh-sach','CustomerController@index')->name('customer.list');
        Route::post('/them-moi','CustomerController@post_add')->name('customer.add')->middleware(['can:admin']);
        Route::post('/chinh-sua','CustomerController@post_edit')->name('customer.edit')->middleware(['can:admin']);
        Route::get('/tim-kiem','CustomerController@search')->name('customer.search');
    });

    Route::group(['prefix'=>'/cac-loai-che'],function(){
        Route::get('/danh-sach','ProductController@index')->name('product.list');
        Route::post('/tao-moi','ProductController@post_add')->name('product.add')->middleware(['can:admin']);
        Route::post('/chinh-sua','ProductController@post_edit')->name('product.edit')->middleware(['can:admin']);
    });

    Route::group(['prefix'=>'/don-hang','middleware'=>'can:employee'],function(){
        Route::group(['prefix'=>'/tao-moi'],function(){
            Route::get('/khach-hang-moi','OrderController@add_with_new_customer')->name('order.add.new_customer');
            Route::post('/khach-hang-moi','OrderController@post_add_with_new_customer')->name('order.add.new_customer');
            Route::get('/nong-ho/{id}','OrderController@add_with_old_customer')->name('order.add.old_customer');
            Route::post('/nong-ho/{id}','OrderController@post_add_with_old_customer')->name('order.add.old_customer');
            Route::get('/danh-sach-don/nong-ho/{id}','OrderController@list_by_customer')->name('order.list_by_customer');
        });
        Route::get('/don-hang/{id}','OrderController@list_by_id')->name('order.list_by_id');
    });
    
    Route::group(['prefix'=>'/danh-sach-don'],function(){
        Route::get('/danh-sach-da-luu','ListController@list_order_save')->name('listorder.list_order_save');
        Route::get('/chi-tiet/{id}','ListController@list_order_save_change')->name('listorder.list_order_save_change');
        Route::delete('/xoa-sp/{id}','ListController@delete_item')->name('listorder.delete_item');
        Route::get('/sua-sp/{id}','ListController@edit_item')->name('listorder.edit_item');
        Route::post('/sua-sp/{id}','ListController@update_item')->name('listorder.update_item');
        Route::post('/them-sp/{id}','ListController@save_add')->name('listorder.save_add');

        Route::get('/danh-sach-da-gui','ListController@list_order_send')->name('listorder.list_order_send');
        Route::get('/chi-tiet-don-gui/{id}','ListController@list_order_send_detail')->name('listorder.list_order_send_detail');
    });
    
    Route::group(['prefix'=>'/bao-cao'],function(){
        // Báo cáo theo ngày
        Route::get('/hom-nay','OrderController@report_today')->name('report.today');
        Route::get('/hom-nay/nong-ho/{id}','OrderController@list_by_customer_today')->name('order.list_by_customer_today');
        Route::post('/ngay','OrderController@report_search_day')->name('report.search.day');
        // Báo cáo theo tuần
        Route::get('/tuan','OrderController@report_week')->name('report.week');
        Route::post('/tuan','OrderController@post_report_week')->name('report.week');
        Route::get('/ngay/{d}','OrderController@report_day')->name('report.day');
        // Báo cáo theo tháng
        Route::get('/thang','OrderController@report_month')->name('report.month');
        Route::post('/thang','OrderController@post_report_month')->name('report.month');
        Route::get('/thang/{m}','OrderController@report_by_month')->name('report.by_month');
        // Báo cáo theo năm
        Route::get('/năm','OrderController@report_year')->name('report.year');
        Route::post('/năm','OrderController@post_report_year')->name('report.year');
        //Xuất execl
        Route::get('/excel','OrderController@excel')->name('report.excel');
        Route::post('/export','OrderController@export')->name('report.export');

    });

    
});
