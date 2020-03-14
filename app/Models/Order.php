<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = ['customer_id','name','phone','address','status'];

    public function orderCustomer(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
}
