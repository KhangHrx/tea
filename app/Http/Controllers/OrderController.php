<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function add_with_new_customer()
    {
        $last_id = Order::all('id')->count();
        $products = Product::where('state',1)->get(['id','name','deduction','price']);
        return view('order.add_order_with_new_customer',[
            'last_id'=>$last_id,
            'products'=>$products
        ]);
    }

    public function post_add_with_new_customer()
    {
        $last_id = Order::all('id')->count();
        dd($last_id);
    }

    public function list_order_save()
    {   
        
        $orders = Order::with('order_detail:id,name,weight');
        return view('order.list_order_save', ['orders'=>$orders]);
    }

    public function list_order_save_change()
    {
        return view('order.list_order_save_change');
    }
}
