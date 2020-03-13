<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\CartHelper;

class CartController extends Controller
{
    public function post_add(CartHelper $cart, Request $request)
    {
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
