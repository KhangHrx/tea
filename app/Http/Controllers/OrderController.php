<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function add_with_new_customer()
    {
        return view('order.add_order_with_new_customer');
    }

    public function post_add_with_new_customer()
    {
        $last_id = Order::all('id')->count();
        dd($last_id);
    }

}
