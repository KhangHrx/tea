<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Helper\CartHelper;
use DB;
use App\Quotation;

class OrderController extends Controller
{

    public function add_with_new_customer()
    {
        $last_id = Order::max('id');
        $products = Product::where('state',1)->get(['id','name','deduction','price']);
        return view('order.add_order_with_new_customer',[
            'last_id'=>$last_id,
            'products'=>$products
        ]);
    }

    public function post_add_with_new_customer(CartHelper $cart, Request $request)
    {
        $request->merge(['customer_id'=>null]);
        $request->offsetUnset('_token');
        if($request->action=="save")
        {
            Order::create($request->all());
        }
        else
        {
            $request->merge(['status'=>1]);
            Order::create($request->all());
        }
        $order_id = Order::max('id');
        foreach($cart->items as $c){
            DB::table('order_detail')->insert([
                'order_id'=>$order_id,
                'product_id'=>$c['id'],
                'weight'=>$c['weight'],
                'deduction_per'=>$c['deduction_per'],
                'deduction_kg'=>$c['deduction_kg'],
                'price'=>$c['price'],
                'note'=>$c['note'],
            ]);
        }
        session(['cart'=>[]]);
        return redirect()->back();
    }

    public function add_with_old_customer($id)
    {
        $last_id = Order::max('id');
        $products = Product::where('state',1)->get(['id','name','deduction','price']);
        $model = Customer::find($id);
        return view('order.add_order_with_old_customer',[
            'last_id'=>$last_id,
            'products'=>$products,
            'model'=>$model
        ]);
    }

    public function post_add_with_old_customer($id, CartHelper $cart, Request $request)
    {
        $request->merge(['customer_id'=>$id]);
        $request->offsetUnset('_token');
        if($request->action=="save")
        {
            Order::create($request->all());
        }
        else
        {
            $request->merge(['status'=>1]);
            Order::create($request->all());
        }
        $order_id = Order::max('id');
        foreach($cart->items as $c){
            DB::table('order_detail')->insert([
                'order_id'=>$order_id,
                'product_id'=>$c['id'],
                'weight'=>$c['weight'],
                'deduction_per'=>$c['deduction_per'],
                'deduction_kg'=>$c['deduction_kg'],
                'price'=>$c['price'],
                'note'=>$c['note'],
            ]);
        }
        session(['cart'=>[]]);
        return redirect()->back();
    }

}
