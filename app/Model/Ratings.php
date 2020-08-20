<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    protected $table = "ratings";

    protected $fillable = [
        'total', 'articles_id', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function articles()
    {
        return $this->belongsTo('App\Model\Article');
    }
}
