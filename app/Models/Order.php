<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = ['customer_id','total_weight','total_money','total_money_paid','name','phone','address','status'];

<<<<<<< HEAD
    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class, 'order_id','id');
    }
=======
>>>>>>> eadef915e4d25c1723f5938b58990644f3ddb695
    public function orderCustomer(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
    public function orderdetail(){
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
}
