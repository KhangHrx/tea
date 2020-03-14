<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pay;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;

class LiabilityController extends Controller
{
    public function list(){
        $data['order'] = Order::all();
        $data['totalMoney'] = Order::get()->sum('total_money');
        $data['totalMoneyPaid'] = Order::get()->sum('total_money_paid');
        return view('liabilities.customer_list',$data);
    }
    public function unpaidList($id){
        $data['order_list'] = OrderDetail::where('order_id',$id)->get();
        $data['totalMoney'] = Order::get()->sum('total_money');
        $data['totalMoneyPaid'] = Order::get()->sum('total_money_paid');
        return view('liabilities.unpaid_list',$data);
    }
}
