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
use Carbon\Carbon;

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
        $this->validate($request,[
            'name'=>'required|string',
            'phone'=>'nullable|string',
            'address'=>'required|string'
        ],[
            'name.required'=>'Tên không được để trống',
            'name.string'=>'Tên chỉ chứa văn bản',
            'phone.string'=>'Số điện thoại không hợp lệ',
            'address.required'=>'Địa chỉ không được để trống',
            'address.string'=>'Địa chỉ chỉ chứa văn bản'
        ]);
        Customer::create(['name'=>$request->name,'phone'=>$request->phone,'address'=>$request->address,'state'=>0]);
        $last_customer = Customer::max('id');
        $request->merge(['customer_id'=>$last_customer]);
        $request->merge(['total_weight'=>($cart->get_total_after_deduction())]);
        $request->merge(['total_money'=>($cart->get_total_price())]);
        $request->merge(['total_money_paid'=>($cart->get_total_price())]);
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
                'weight_last'=>($c['weight']*(100-$c['deduction_per'])/100-$c['deduction_kg']),
                'price'=>(($c['weight']*(100-$c['deduction_per'])/100-$c['deduction_kg'])*$c['price']),
                'note'=>$c['note'],
            ]);
        }
        session(['cart'=>[]]);
        return redirect()->route('order.list_by_id',['id'=>$order_id])->with('message','Tạo đơn hàng thành công');
    }

    public function add_with_old_customer($id)
    {
        $last_id = Order::max('id');
        $products = Product::where('state',1)->get(['id','name','deduction','price']);
        $model = Customer::find($id);
        return view('order.add_order_with_old_customer',[
            'id'=>$id,
            'last_id'=>$last_id,
            'products'=>$products,
            'model'=>$model
        ]);
    }

    public function post_add_with_old_customer($id, CartHelper $cart, Request $request)
    {
        $request->merge(['customer_id'=>$id]);
        $request->merge(['total_weight'=>($cart->get_total_after_deduction())]);
        $request->merge(['total_money'=>($cart->get_total_price())]);
        $request->merge(['total_money_paid'=>($cart->get_total_price())]);
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
                'weight_last'=>($c['weight']*(100-$c['deduction_per'])/100-$c['deduction_kg']),
                'price'=>(($c['weight']*(100-$c['deduction_per'])/100-$c['deduction_kg'])*$c['price']),
                'note'=>$c['note'],
            ]);
        }
        session(['cart'=>[]]);
        return redirect()->route('order.list_by_id',['id'=>$order_id])->with('message','Tạo đơn hàng thành công');
    }

    public function list_by_customer($id)
    {
        $model = Order::where('customer_id',$id)->get();
        return view('order.list_order_by_customer',[
            'model'=>$model
        ]);
    }

    public function list_by_id($id)
    {
        $model = Order::find($id);
        return view('order.list_order_by_id',[
            'model'=>$model
        ]);
    }

    // Báo cáo theo ngày
    public function report_today()
    {
        $model = Order::whereDate('created_at',Carbon::today())->groupBy('customer_id')
            ->select(DB::raw('*, sum(total_weight) as t, sum(total_money) as p, sum(total_money_paid) as pp'))->orderBy('id')->get();
        return view('report.report_today',[
            'model'=>$model
        ]);
    }

    public function list_by_customer_today($id)
    {
        $model = Order::where('customer_id',$id)->whereDate('created_at',Carbon::today())->orderBy('id')->get();
        return view('order.list_order_by_customer',[
            'model'=>$model
        ]);
    }

    public function report_search_day(Request $request){
        if($request->date == null)
        {
            return redirect()->route('report.today');
        }
        else
        {
            $model = Order::whereDate('created_at',$request->date)->groupBy('customer_id')
                ->select(DB::raw('*, sum(total_weight) as t, sum(total_money) as p, sum(total_money_paid) as pp'))->orderBy('id')->get();
            return view('report.report_search_day',[
                'date'=>$request->date,
                'model'=>$model
            ]);
        }
    }

    //Báo cáo theo tuần
    public function report_week()
    {
        $now = Carbon::now();
        $startWeek = $now->startOfWeek()->format('Y-m-d H:i:s');
        $endWeek = $now->endOfWeek()->format('Y-m-d H:i:s');
        $model = Order::select(DB::raw('*, sum(total_weight) as t, sum(total_money) as p, sum(total_money_paid) as pp'))->orderBy('id')
            ->groupBy(DB::raw('Date(created_at)'))
            ->where('created_at','>=',$startWeek)->where('created_at','<=',$endWeek)->get();
        return view('report.report_week',[
            'model'=>$model,
            'start'=>$startWeek,
            'end'=>$endWeek
        ]);
    }

    public function post_report_week(Request $request)
    {
        if($request->month == null)
        {
            return redirect()->route('report.week');
        }
        else
        {
            $dayStart = '01'; 
            $dayEnd = '07'; 
            $month = date('m',strtotime($request->month));
            $year = date('Y',strtotime($request->month));
            if($request->week == 2)
            {
                $dayStart = '08'; 
                $dayEnd = '14';
            }
            else if($request->week == 3)
            {
                $dayStart = '15'; 
                $dayEnd = '21';
            }
            else if($request->week == 4)
            {
                $dayStart = '22'; 
                $dayEnd = '28';
            }
            else if($request->week == 5)
            {
                $dayStart = '29'; 
                if($month==1||$month==3||$month==5||$month==7||$month==8||$month==10||$month==12){
                    $dayEnd = '31';
                }else if($month==4||$month==6||$month==9||$month==11){
                    $dayEnd = '30';
                }else if($year%4==0){
                    $dayEnd = '29';
                }else{
                    return redirect()->back()->with(['message'=>'Tuần không tồn tại']);
                }
            }
            $startWeek=($request->month).'-'.$dayStart;
            $endWeek=($request->month).'-'.$dayEnd.' 23:59:59';
        }
        $model = Order::select(DB::raw('*, sum(total_weight) as t, sum(total_money) as p, sum(total_money_paid) as pp'))->orderBy('id')
            ->groupBy(DB::raw('Date(created_at)'))
            ->where('created_at','>=',$startWeek)->where('created_at','<=',$endWeek)->get();
        return view('report.report_week',[
            'model'=>$model,
            'start'=>$startWeek,
            'end'=>$endWeek
        ]);
    }

    public function report_day($d){
        $day = date('Y-m-d',strtotime($d));
        $model = Order::whereDate('created_at',$day)->groupBy('customer_id')
            ->select(DB::raw('*, sum(total_weight) as t, sum(total_money) as p, sum(total_money_paid) as pp'))->orderBy('id')->get();
        return view('report.report_search_day',[
            'date'=>$day,
            'model'=>$model
        ]);
    }

    // Báo cáo theo tháng
    public function report_month()
    {
        $now = Carbon::now();
        $month = $now->month;
        $model = Order::select(DB::raw('created_at, sum(total_weight) as t, sum(total_money) as p, sum(total_money_paid) as pp'))->orderBy('id')
            ->groupBy(DB::raw('Date(created_at)'))
            ->whereMonth('created_at','=',$month)->get();
        return view('report.report_month',[
            'model'=>$model,
            'time'=>$now
        ]);
    }

    public function post_report_month(Request $request)
    {
        if($request->month == null)
        {
            return redirect()->route('report.month');
        }
        else
        {
            $month = date('m',strtotime($request->month));
            $year = date('Y',strtotime($request->month));
        }
        $model = Order::select(DB::raw('created_at, sum(total_weight) as t, sum(total_money) as p, sum(total_money_paid) as pp'))->orderBy('id')
            ->groupBy(DB::raw('Date(created_at)'))
            ->whereMonth('created_at','=',$month)->get();
        return view('report.report_month',[
            'model'=>$model,
            'time'=>$request->month
        ]);
    }

    // Báo cáo theo năm
    public function report_year()
    {
        $now = Carbon::now();
        $year = $now->year;
        $model = Order::select(DB::raw('created_at, sum(total_weight) as t, sum(total_money) as p, sum(total_money_paid) as pp'))->orderBy('id')
            ->groupBy(DB::raw('Date(created_at)'))
            ->whereYear('created_at','=',$year)->get();
        return view('report.report_year',[
            'model'=>$model,
            'time'=>$now
        ]);
    }

    public function post_report_year(Request $request)
    {
        if($request->month == null)
        {
            return redirect()->route('report.month');
        }
        else
        {
            $month = date('m',strtotime($request->month));
            $year = date('Y',strtotime($request->month));
        }
        $model = Order::select(DB::raw('created_at, sum(total_weight) as t, sum(total_money) as p, sum(total_money_paid) as pp'))->orderBy('id')
            ->groupBy(DB::raw('Date(created_at)'))
            ->whereMonth('created_at','=',$month)->get();
        return view('report.report_month',[
            'model'=>$model,
            'time'=>$request->month
        ]);
    }
}
