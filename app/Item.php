<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravelista\Comments\Commentable;

class Item extends Model
{
    use SoftDeletes, Commentable;

    protected $fillable = ['user_id', 'souvenir_category_id', 'name', 'slug', 'price', 'stock', 'weight', 'description', 'productphoto'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function souvenir_category()
    {
        return $this->belongsTo('App\SouvenirCategory');
    }

    public function order_detail()
    {
        return $this->hasMany('App\OrderDetail');
    }
}
