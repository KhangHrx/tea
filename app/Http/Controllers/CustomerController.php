<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.customer_list');
    }

    public function detail()
    {
        return view('customer.customer_order_detail');
    }
}
