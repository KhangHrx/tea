<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = ['customer_id','total_weight','total_money','total_money_paid','name','phone','address','status'];

    public function orderCustomer(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
    public function orderdetail(){
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
}
