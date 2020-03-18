<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = "order_detail";
    
    
    public function orderDetail()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function orderdetailorder()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
  
}
