<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = ['item_id', 'order_id', 'quantity', 'totalprice', 'totalweight'];

    public function item()
    {
        return $this->belongsTo('App\Item');
    }

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
