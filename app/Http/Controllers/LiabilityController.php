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
        $data['customer'] = Customer::all();
        // $data['modal'] = Order::where('customer_id','1')->get();
        // dd($data['modal']);
        $data['totalMoney'] = Order::sum('total_money');
        $data['totalMoneyPaid'] = Order::sum('total_money_paid');
        return view('liabilities.customer_list',$data);
    }
    public function unpaidList($id){
        $data['order_list'] = Order::where('customer_id',$id)->get();
        $data['sum_weight'] = Order::where('customer_id',$id)->sum('total_weight');
        $data['sum_money'] = Order::where('customer_id',$id)->sum('total_money');
        $data['sum_paid'] = Order::where('customer_id',$id)->sum('total_money_paid');
        $data['totalMoneyPaid'] = Order::get()->sum('total_money_paid');
        return view('liabilities.unpaid_list',$data);
    }
}
