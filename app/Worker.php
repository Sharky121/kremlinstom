<?php

namespace App;



class Worker extends Base
{
    protected $table = 'workers';
    protected $fillable = ['name','sort','public','position','content','dop_content','url','link','clinic_id'];
    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function pictures(){
        return $this->hasMany('App\Pictures','note_id')->where('link','=','worker')->orderby('sort');
    }

    public function pictures_top(){
        return $this->hasMany('App\Pictures','note_id')->where('link','=','worker_top')->orderby('sort');
    }

    public function certificates(){
        return $this->hasMany('App\Pictures','note_id')->where('link','=','worker_cert')->orderby('sort');
    }

    public function setLinkAttribute($value){
        $this->attributes['link'] = empty($value)?str_slug($this->name):$value;
        $this->url = $this->attributes['link'];
    }

    public function url(){
        return '/'.$this->url;
    }

    public function services(){
        return $this->belongsToMany('App\Service');
    }

    public function experiences(){
        return $this->hasMany('App\Experience')->orderBy('sort');
    }

    public function reviews()
    {
        return $this->morphMany('App\Review', 'owner','type','parent');
    }

    public function specializations(){
        return $this->belongsToMany('App\Specialization');
    }

    public function clinic(){
        return $this->hasOne('App\Clinic','id','clinic_id');
    }

    /**
     * @return bool|null
     * @throws \Exception
     */
    public function delete()
    {
        $this->pictures->delete();
        $this->experiences()->delete();
        return parent::delete();
    }
}
