<?php

namespace App;

class Experience extends Base
{
    protected $fillable = ['title','sort','content','worker_id'];
    public $timestamps = false;

    public function pictures(){
        return $this->hasMany('App\Pictures','note_id')->where('link','=','experience')->orderby('sort');
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
