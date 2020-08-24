<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles()
    {
        return $this->belongsTo('App\Model\Roles');
    }
    public function rating()
    {
      return $this->hasMany('App\Model\Rating', 'user_id');
    }
    public function articles()
    {
      return $this->hasMany('App\Model\Article', 'user_id');
    }
    public function count_articles()
    {
        return $this->articles()->where('status_id', 3)->count();
    }
    public function my_rating()
    {
        $rataut = $this->articles()->where('status_id', 3)->get();
        return round($rataut->map(function ($item, $key) {
                                return $item->ratings()->pluck('total');
                                })->collapse()->avg(),3)*10;
    }
    public function my_karma()
    {
        $rataut = $this->articles()->where('status_id', 3)->get();
        return round($rataut->map(function ($item, $key) {
            return $item->ratings()->avg('total');
        })->avg(),3)*10;
    }
}
