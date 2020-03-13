<?php

namespace App\Helper;

class CartHelper
{
    public $items = [];

    public function __construct()
    {
        $this->items = session('cart')?session('cart'):[];
    }

    public function add($product)
    {
        $item = [
            'id'=>$product['id'],
            'name'=>$product['name'],
            'weight'=>$product['weight'],
            'deduction_per'=>$product['deduction_per'],
            'deduction_kg'=>$product['deduction_kg'],
            'price'=>$product['price'],
            'note'=>$product['note']
        ];
        $this->items[$product['id']] = $item;
        session(['cart'=>$this->items]);
    }

    public function remove($id)
    {
        unset($this->items[$id]);
        session(['cart'=>$this->items]);
    }

    public function clear()
    {
        session(['cart'=>[]]);
    }

    public function get_total_weight()
    {
        $t = 0;
        foreach($this->items as $item)
        {
            $t += $item['weight'];
        }
        return $t;
    }

    public function get_total_deduction_kg()
    {
        $t = 0;
        foreach($this->items as $item)
        {
            $t += $item['deduction_kg'];
        }
        return $t;
    }

    public function get_total_after_deduction()
    {
        $t = 0;
        foreach($this->items as $item)
        {
            $t += $item['weight']*(100-$item['deduction_per'])/100-$item['deduction_kg'];
        }
        return $t;
    }

    public function get_total_price()
    {
        $t = 0;
        foreach($this->items as $item)
        {
            $t += ($item['weight']*(100-$item['deduction_per'])/100-$item['deduction_kg'])*$item['price'];
        }
        return $t;
    }
}

?>