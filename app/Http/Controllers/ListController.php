<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
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
        $sp = Product::all()->toArray();
        // $insp = OrderDetail::find($id)->toArray();
        $orders = Order::with('orderCustomer')->get();
        $todetail = Order::with('orderdetail')->get();
        $toproduct = OrderDetail::where('order_id',$id)->get();
        $weightfirst = OrderDetail::where('order_id',$id)->sum('weight');
        $weightlast = OrderDetail::where('order_id',$id)->sum('weight_last');
        $total = OrderDetail::where('order_id',$id)->sum('price');

        return view('listorder.list_order_save_change',['order'=>$order,'todetail'=>$todetail,'toproduct'=>$toproduct, 'weightfirst'=>$weightfirst, 'weightlast'=>$weightlast, 'total'=>$total, 'orders'=>$orders, 'sp'=>$sp]);
    }
    public function edit_item($id)
    {

        $cate =  OrderDetail::find($id);
        $sp = Product::all()->toArray();

        // $todetail = OrderDetail::with('orderDetail')->get();
        return view('listorder.edit_item',['sp'=>$sp,'cate'=>$cate]);
    }
    public function update_item(Request $request,$id)
    {
        $id_product = Product::find($request->item_id);
        // dd($id_product);
        // $id_order = OrderDetail::find($id);
        $new = OrderDetail::find($id);
        $new->order_id = $new->orderDetail->id;
        // dd($new->orderDetail->id);
        $new->product_id = $request->item_id;
        $new->weight = $request->weight;
        $new->deduction_per = $request->deduction_per;
        $new->deduction_kg = $request->deduction_kg;
        $new->weight_last = $request->weight - (($request->weight)*($request->deduction_per)/100) - $request->deduction_kg;
        $new->note = $request->note;
        $new->price = $id_product->price * ($request->weight - (($request->weight)*($request->deduction_per)/100) - $request->deduction_kg);
        


        $new->save();
        return redirect()->route('listorder.list_order_save_change',['id'=>$new->orderDetail->id]); 
    }
    public function delete_item($id)
    {
        // $item = Order::find($id);
        OrderDetail::destroy($id);
        return redirect()->back(); 
        
    }
}
