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
    public function my_user()
    {
        return $this->user->name;
    }
    public function my_article()
    {
        return $this->articles->title;
    }
    public function article_user()
    {
        return $this->articles->my_user();
    }
}
