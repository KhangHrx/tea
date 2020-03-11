<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    
    public function loan_list()
    {
        return view('loan.loan_customer_list');
    }
    
    public function loan_customer()
    {
        return view('loan.loan_customer');
    }
    
    public function loan_detail()
    {
        return view('loan.loan_order');
    }
    
    public function order_add()
    {
        return view('order.order_add');
    }
    
    public function order_detail()
    {
        return view('order.order_detail');
    }
    
    public function order_by_customer()
    {
        return view('order.order_add_by_customer');
    }
}
