<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
class ListController extends Controller
{
    public function list_order_save()
    {   
        
        $orders = Order::with('orderCustomer')->where('status', 0)->get();

        return view('listorder.list_order_save', ['orders'=>$orders]);
    }

    public function list_order_save_change($id)
    {
        $order = Order::find($id);        
        $orders = Order::with('orderCustomer')->get();
        $todetail = Order::with('orderdetail')->get();
        $toproduct = OrderDetail::where('order_id',$id)->get();
        $weightfirst = OrderDetail::where('order_id',$id)->sum('weight');
        $weightlast = OrderDetail::where('order_id',$id)->sum('weight_last');
        $total = OrderDetail::where('order_id',$id)->sum('price');

        return view('listorder.list_order_save_change',['order'=>$order,'todetail'=>$todetail,'toproduct'=>$toproduct, 'weightfirst'=>$weightfirst, 'weightlast'=>$weightlast, 'total'=>$total, 'orders'=>$orders]);
    }
    public function delete_item($id)
    {
        // $item = Order::find($id);
        OrderDetail::destroy($id);
        return redirect()->route('listorder.list_order_save_change'); 
        
    }
}
