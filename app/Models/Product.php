<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = ['name','price','deduction','state'];
    public function productOrder()
    {
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
}
