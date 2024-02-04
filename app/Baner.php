<?php

namespace App;

class Baner extends Base
{
    protected $table = 'baners';
    protected $fillable = ['title','link','type','public','sort','parent','content'];
    public $timestamps = false;

    public function pictures(){
        return $this->hasMany('App\Pictures','note_id')->where('link','=','baner')->orderby('sort');
    }


    /**
     * @return bool|null
     * @throws \Exception
     */
    public function delete()
    {
        $this->pictures->delete();
        return parent::delete();
    }
}
