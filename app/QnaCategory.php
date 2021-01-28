<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QnaCategory extends Model
{
    protected $fillable = ['name', 'slug'];

    public function question()
    {
        return $this->hasMany('App\Question');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
