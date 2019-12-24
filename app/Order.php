<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function order_items()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
