<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "articles";

    protected $fillable = [
        'title', 'discription', 'preview', 'user_id', 'status_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function status()
    {
        return $this->belongsTo('App\Model\Status');
    }
    public function ratings()
    {
      return $this->hasMany('App\Model\Ratings', 'articles_id');
    }
    public function my_user()
    {
        return $this->user->name;
    }
    public function attach_author()
    {
        return Article::where('user_id', $this->user_id)->
                        where('status_id', 3)->count();
    }
    public function my_ratings()
    {
        return $this->ratings()->avg('total');
    }
    public function my_status()
    {
        return $this->status->name;
    }
    public function rating_author()
    {
        $rataut = Article::where('user_id', $this->user_id)->where('status_id', 3)->get();
        return round($rataut->map(function ($item, $key) {
                                return $item->ratings()->pluck('total');
                                })->collapse()->avg(),3)*10;
    }
    public function karma_author()
    {
        $rataut = Article::where('user_id', $this->user_id)->where('status_id', 3)->get();
        return round($rataut->map(function ($item, $key) {
            return $item->ratings()->avg('total');
        })->avg(),3)*10;
    }
    public function cut_discription($length) 
    {
        $this->discription=mb_substr($this->discription,0,$length,"utf-8"). "...";
        return $this;
    }
    public function cut_title($length) 
    {
        $this->title=mb_substr($this->title,0,$length,"utf-8"). "..";
        return $this;
    }
    public function date() 
    {
        return mb_substr($this->created_at,0,10,"utf-8");
    }
}
