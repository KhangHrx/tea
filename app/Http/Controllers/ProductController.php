<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        $model = Product::orderBy('state','desc')->get();
        return view('product.product-list',[
            'model'=>$model
        ]);
    }

    public function post_add(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string',
            'deduction'=>'required|numeric',
            'price'=>'required|numeric',
            'state'=>'required|numeric|between:0,1'
        ],[
            'name.required'=>'Tên không được để trống',
        ]);
        Product::create($request->all());
        return redirect()->back();
    }

    public function post_edit(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string',
            'deduction'=>'required|numeric',
            'price'=>'required|numeric',
            'state'=>'required|numeric|between:0,1'
        ],[
            'name.required'=>'Tên không được để trống',
        ]);
        Product::find($request->id)->update($request->only('name','price','deduction','state'));
        return redirect()->back();
    }
}
