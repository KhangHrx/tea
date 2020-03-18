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
        $cate =  OrderDetail::find($id);
        $order = Order::find($id);        
        $sp = Product::all()->toArray();
        $products = Product::where('state',1)->get(['id','name','deduction','price']);
        // $insp = OrderDetail::find($id)->toArray();
        $orders = Order::with('orderCustomer')->get();
        $todetail = Order::with('orderdetail')->get();
        $toproduct = OrderDetail::where('order_id',$id)->get();
        $weightfirst = OrderDetail::where('order_id',$id)->sum('weight');
        $weightlast = OrderDetail::where('order_id',$id)->sum('weight_last');
        $total = OrderDetail::where('order_id',$id)->sum('price');

        return view('listorder.list_order_save_change',['order'=>$order,'todetail'=>$todetail,'toproduct'=>$toproduct, 'weightfirst'=>$weightfirst, 'weightlast'=>$weightlast, 'total'=>$total, 'orders'=>$orders, 'sp'=>$sp, 'cate'=>$cate,'products'=>$products]);
    }
    public function edit_item($id)
    {

        $cate =  OrderDetail::find($id);
        $sp = Product::all();
        $products = Product::where('state',1)->get(['id','name','deduction','price']);
        // dd($cate);
        // $todetail = OrderDetail::with('orderDetail')->get();
        return view('listorder.edit_item',[
            'sp'=>$sp,
            'cate'=>$cate,
            'products'=>$products
            ]);
    }
    public function update_item(Request $request,$id)
    {
        $id_product = Product::find($request->item_id);
        $new = OrderDetail::find($id);
        // update_order
        $update_order = Order::find($new->orderdetailorder->id);
        $update_order->total_weight =  ($update_order->total_weight - $new->weight_last) + ($request->weight - (($request->weight)*($request->deduction_per)/100) - $request->deduction_kg);
        $update_order->total_money = ($update_order->total_money - $new->price) + ($id_product->price * ($request->weight - (($request->weight)*($request->deduction_per)/100) - $request->deduction_kg));
        $update_order->save();
        // update-order: total_weight,total_money
        $new->order_id = $new->orderdetailorder->id;
        $new->product_id = $request->item_id;
        $new->weight = $request->weight;
        $new->deduction_per = $request->deduction_per;
        $new->deduction_kg = $request->deduction_kg;
        $new->weight_last = $request->weight - (($request->weight)*($request->deduction_per)/100)- $request->deduction_kg;
        $new->note = $request->note;
        $new->price = $id_product->price * ($request->weight - (($request->weight)*($request->deduction_per)/100) - $request->deduction_kg);
        $new->save();
        
        return redirect()->route('listorder.list_order_save_change',['id'=>$new->orderdetailorder->id]); 
    }
    public function save_add(Request $request, $id)
    {
        //update order
        $id_product = Product::find($request->item_id);
        $new = new OrderDetail();
        $new->order_id = $id;
        $new->product_id = $request->item_id;
        $new->weight = $request->weight;
        $new->deduction_per = $request->deduction_per;
        $new->deduction_kg = $request->deduction_kg;
        $new->weight_last = $request->weight - (($request->weight)*($request->deduction_per)/100) - $request->deduction_kg;
        $new->price = $id_product->price * ($request->weight - (($request->weight)*($request->deduction_per)/100) - $request->deduction_kg);
        $new->note = $request->note;
        $new->save();
        //update-order: total_weight,total_money 
        $update_order = Order::find($id);
        $update_order ->total_weight +=  ($request->weight - (($request->weight)*($request->deduction_per)/100) - $request->deduction_kg);
        $update_order->total_money += ($id_product->price * ($request->weight - (($request->weight)*($request->deduction_per)/100) - $request->deduction_kg));
        $update_order->save();
        return redirect()->route('listorder.list_order_save_change',['id'=>$id]); 
    }
    public function delete_item($id)
    {
        OrderDetail::destroy($id);
        return redirect()->back(); 
    }

    public function send_to_accountant($id)
    {
        $update_order = Order::find($id);
        $update_order->status = 1;
        $update_order->save();
        return redirect()->route('listorder.list_order_send');
    }


    public function list_order_send()
    {   
        $orders = Order::with('orderCustomer')->where('status', 1)->get();
        return view('listorder.list_order_send', ['orders'=>$orders]);
    }
    public function list_order_send_detail($id)
    {
        $cate =  OrderDetail::find($id);
        $order = Order::find($id);        
        $sp = Product::all()->toArray();
        $products = Product::where('state',1)->get(['id','name','deduction','price']);
        $orders = Order::with('orderCustomer')->get();
        $todetail = Order::with('orderdetail')->get();
        $toproduct = OrderDetail::where('order_id',$id)->get();
        $weightfirst = OrderDetail::where('order_id',$id)->sum('weight');
        $weightlast = OrderDetail::where('order_id',$id)->sum('weight_last');
        $total = OrderDetail::where('order_id',$id)->sum('price');

        return view('listorder.list_order_send_detail',['order'=>$order,'todetail'=>$todetail,'toproduct'=>$toproduct, 'weightfirst'=>$weightfirst, 'weightlast'=>$weightlast, 'total'=>$total, 'orders'=>$orders, 'sp'=>$sp, 'cate'=>$cate,'products'=>$products]);
    }
}
