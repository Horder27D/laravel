<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "articles";

    protected $fillable = [
        'title', 'discription', 'preview', 'user_id', 'status_id', 'user_name'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
