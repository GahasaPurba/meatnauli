<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'orderdate', 'status', 'code', 'totalprice', 'totalweight', 'ongkir', 'kurir', 'etd', 'province_destination', 'city_destination', 'address', 'buktipembayaran'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function order_detail()
    {
        return $this->hasMany('App\OrderDetail');
    }
}
