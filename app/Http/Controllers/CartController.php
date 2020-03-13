<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\CartHelper;

class CartController extends Controller
{
    public function post_add(CartHelper $cart, Request $request)
    {
        $this->validate($request,[
            'weight'=>'required|numeric',
            'deduction_per'=>'required|numeric',
            'deduction_kg'=>'required|numeric',
            'price'=>'required|numeric',
            'note'=>'string|nullable'
        ],[
            'weight.required'=>'Khối lượng không được trống',
            'weight.numeric'=>'Khối lượng chỉ gồm số',
            'deduction_per.required'=>'Khấu trừ % không được để trống',
            'deduction_per.numeric'=>'Khấu trừ % chỉ gồm số',
            'deduction_kg.required'=>'Khấu trừ khối lượng không được để trống',
            'deduction_kg.numeric'=>'Khấu trừ khối lượng chỉ gồm số',
            'note.string'=>'Ghi chú chỉ gồm văn bản'
        ]);
        $request->offsetUnset('_token');
        $cart->add($request->all());
        return redirect()->back();
    }

    public function remove(CartHelper $cart, $id)
    {
        $cart->remove($id);
        return redirect()->back();
    }

    public function clear(CartHelper $cart)
    {
        $cart->clear();
        return redirect()->route('home');
    }
}
