<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $model = Customer::all();
        return view('customer.customer-list',[
            'model'=>$model
        ]);
    }

    public function post_add(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string',
            'address'=>'required|string'
        ],[

        ]);
        Customer::create($request->all());
        return redirect()->back();
    }

    public function post_edit(Request $request)
    {
        $this->validate($request,[
            'address'=>'required|string'
        ],[

        ]);
        Customer::find($request->id)->update($request->only('address','phone'));
        return redirect()->back();
    }
}
