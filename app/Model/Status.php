<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = "status";

    protected $fillable = [
        'name'
    ];
    
    public function articles()
    {
      return $this->hasMany('App\Model\Article', 'articles_id');
    }
}
