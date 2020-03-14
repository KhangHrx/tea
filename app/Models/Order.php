<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = ['customer_id','total_weight','total_money','total_money_paid','name','phone','address','status'];

    public function order_detail()
    {
        return $this->belongsTo(OrderDetail::class, 'order_id');
    }
    public function orderCustomer(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
}
