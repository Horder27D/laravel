<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    protected $table = "ratings";

    protected $fillable = [
        'total'
    ];
}
