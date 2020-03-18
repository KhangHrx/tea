<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pay;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use DB;

class PayController extends Controller
{
    public function list(){
        $data['orders'] = Order::all();
        $data['order'] = Order::where('total_money_paid', '!=', 0)->select('customer_id',DB::Raw('sum(total_weight) as sum_weight,sum(total_money) as sum_money, sum(total_money_paid) as sum_money_paid'))
        ->groupBy('customer_id')
        ->get();
        // dd($data['order']);
        $data['customer'] = Customer::all();
        // $data['modal'] = Order::where('customer_id','1')->get();
        // dd($data['modal']); 
        $data['totalMoney'] = Order::where('total_money_paid', '!=', 0)->sum('total_money');
        $data['totalWeight'] = Order::where('total_money_paid', '!=', 0)->sum('total_weight');
        $data['totalMoneyPaid'] = Order::where('total_money_paid', '!=', 0)->sum('total_money_paid');
        return view('pays.customer_list',$data);
    }
    public function unpaidList($id){
        $data['order'] = Order::find($id);
        $data['order_list'] = Order::where('customer_id',$id)->where('total_money_paid', '!=', 0)->get();
        // dd($data['order_list']);
        $data['orderDetails'] = OrderDetail::where('order_id',$id)->get();
        $data['sum_weight'] = Order::where('total_money_paid', '!=', 0)->where('customer_id',$id)->sum('total_weight');
        $data['sum_money'] = Order::where('total_money_paid', '!=', 0)->where('customer_id',$id)->sum('total_money');
        $data['sum_paid'] = Order::where('total_money_paid', '!=', 0)->where('customer_id',$id)->sum('total_money_paid');
        $data['totalMoneyPaid'] = Order::get()->sum('total_money_paid');
        return view('pays.unpaid_list',$data);
    }
    public function postPayOrder($id,Request $req){
        $this->validate($req,[
            'id_order' => 'required',
        ],[
            'id_order.required' => 'Vui lòng chọn đơn rồi thanh toán!'
        ]);
        $data['order'] = Order::find($id);
        $arrayIdOrder = $req->id_order;
        foreach($arrayIdOrder as $idOrder){
            $findOrder = Order::find($idOrder);

            $newPay = new Pay;
            $newPay->order_id = $idOrder;
            $newPay->money = $findOrder->total_money_paid;
            $newPay->save();

            $findOrder->total_money_paid = 0;
            $findOrder->save();
        }
        return redirect()->back()->with('message','Thanh toán đơn thành công !');

        // dd($arrayIdOrder);
    }
    public function unpaidDetail($id){
        // shows sách sách đơn
        $data = [
            'order' => Order::find($id),
            'todetail' => Order::with('orderdetail')->get(),
            'toproduct' => OrderDetail::where('order_id',$id)->orderBy('id','DESC')->get(),
            'weightfirst' => OrderDetail::where('order_id',$id)->sum('weight'),
            'weightlast' => OrderDetail::where('order_id',$id)->sum('weight_last'),
            'totalPrice' => OrderDetail::where('order_id',$id)->sum('price'),
            'totalPay' => Pay::where('order_id',$id)->sum('money'),
        ];
        return view('pays.detail_unpaid_list',$data);
    }
    public function postPayUnpaid($id,Request $req){
        $this->validate($req,[
            'pay' => 'required|numeric|min:0',
            // 'pay' => 'required|numeric|min:0|lt:price',
        ],[
            'pay.required' => 'Số tiền cần thanh toán không được để trống !',
            'pay.lt' => 'Số tiền cần thanh toán phải nhỏ hơn giá trị đơn',
            'pay.min' => 'Số tiền cần thanh toán không được để số âm',
        ]);
        $newPay = new Pay;
        $newPay->order_id = $id;
        $newPay->money = $req->pay;
        $newPay->save();

        $orderPaid = Order::find($id);
        $orderPaid->total_money_paid = $orderPaid->total_money_paid - $req->pay;
        $orderPaid->save();
        return redirect()->back()->with('message','Thanh toán đơn thành công !');
    }

    // Đơn hàng đã thanh toán
    public function customerPaidList(){
        $data['order'] = Order::where('total_money_paid', '=', 0)->select('customer_id',DB::Raw('sum(total_weight) as sum_weight,sum(total_money) as sum_money, sum(total_money_paid) as sum_money_paid'))
        ->groupBy('customer_id')
        ->get();
        $data['customer'] = Customer::all();
        $data['totalMoney'] = Order::where('total_money_paid', '=', 0)->sum('total_money');
        $data['totalMoneyPaid'] = Order::where('total_money_paid', '=', 0)->sum('total_money_paid');
        $data['totalWeight'] = Order::where('total_money_paid', '=', 0)->sum('total_weight');
        return view('pays.paid_customer_list',$data);
    }
    public function paidList($id){
        $data['order'] = Order::find($id);
        $data['order_list'] = Order::where('customer_id',$id)->where('total_money_paid', '=', 0)->get();
        $data['orderDetails'] = OrderDetail::where('order_id',$id)->get();
        $data['sum_weight'] = Order::where('customer_id',$id)->where('total_money_paid', '=', 0)->sum('total_weight');
        $data['sum_money'] = Order::where('customer_id',$id)->where('total_money_paid', '=', 0)->sum('total_money');
        $data['sum_paid'] = Order::where('customer_id',$id)->where('total_money_paid', '=', 0)->sum('total_money_paid');
        $data['totalMoneyPaid'] = Order::get()->sum('total_money_paid');
        return view('pays.paid_list',$data);
    }
    public function detaiPaidlList($id){
        $data = [
            'order' => Order::find($id),
            'todetail' => Order::with('orderdetail')->get(),
            'toproduct' => OrderDetail::where('order_id',$id)->orderBy('id','DESC')->get(),
            'weightfirst' => OrderDetail::where('order_id',$id)->sum('weight'),
            'weightlast' => OrderDetail::where('order_id',$id)->sum('weight_last'),
            'totalPrice' => OrderDetail::where('order_id',$id)->sum('price'),
        ];
        return view('pays.detail_paid_list',$data);
    }
}
