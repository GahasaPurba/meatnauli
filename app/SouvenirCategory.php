<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SouvenirCategory extends Model
{
    protected $fillable = ['name', 'slug'];

    public function item()
    {
        return $this->hasMany('App\Item');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
