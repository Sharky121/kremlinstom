<?php

namespace App;

class Review extends Base
{
    protected $table = 'reviews';
    protected $fillable = ['author','content','public','sort','parent','date','type','video_link'];
    protected $dates = ['date'];
    public function pictures(){
        return $this->hasMany('App\Pictures','note_id')->where('link','=','review')->orderBy('sort');
    }

    public function owner()
    {
        return $this->morphTo('owner','type','parent');
    }

    /*public function doctor(){
        return $this->belongsTo('App\Worker','parent','id');
    }

    public function service(){
        return $this->belongsTo('App\Service','parent','id');
    }*/
}
