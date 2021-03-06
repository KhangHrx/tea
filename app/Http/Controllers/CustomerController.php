<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $model = Customer::where('state','1')->get();
        return view('customer.customer-list',[
            'model'=>$model
        ]);
    }

    public function post_add(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string',
            'address'=>'required|string',
            'phone'=>'string|nullable'
        ],[
            'name.required'=>'Tên nông hộ không được để trống',
            'name.string'=>'Tên nông hộ chỉ gồm văn bản',
            'address.required'=>'Địa chỉ không được để trống',
            'address.string'=>'Địa chỉ chỉ gồm văn bản',
            'phone.string'=>'Số điện thoại chỉ gồm văn bản'
        ]);
        $request->merge(['state'=>'1']);
        Customer::create($request->all());
        return redirect()->back();
    }

    public function post_edit(Request $request)
    {
        $this->validate($request,[
            'address'=>'required|string',
            'phone'=>'string|nullable'
        ],[
            'address.required'=>'Địa chỉ không được để trống',
            'address.string'=>'Địa chỉ chỉ gồm văn bản',
            'phone.string'=>'Số điện thoại chỉ gồm văn bản'
        ]);
        Customer::find($request->id)->update($request->only('address','phone'));
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $key = $request->key;
        if($key == '')
        {
            return redirect()->route('home');
        }
        else
        {
            $model = Customer::where('state','1')->where('name','like','%'.$key.'%')->get();
            return view('customer.customer-search',[
                'key'=>$key,
                'model'=>$model
            ]);
        }
    }
}
