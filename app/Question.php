<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravelista\Comments\Commentable;

class Question extends Model
{
    use SoftDeletes, Commentable;

    protected $fillable = ['user_id', 'qna_category_id', 'question', 'slug'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function qna_category()
    {
        return $this->belongsTo('App\QnaCategory');
    }
}
