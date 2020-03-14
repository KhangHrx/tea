<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $fillable = ['name','phone','address'];

    public function customerOrders(){
        return $this->hasMany(Order::class,'customer_id','id');
    }
}
