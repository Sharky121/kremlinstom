<?php

namespace App;



class Gallery extends Base
{
    protected $table = 'gallery';
    protected $fillable = ['title','content','public','sort'];
    public $timestamps = false;

    public function pictures(){
        return $this->hasMany('App\Pictures','note_id')->where('link','=','gallery')->orderby('sort');
    }

    /**
     * @return bool|null
     * @throws \Exception
     */
    public function delete()
    {

        $this->pictures->delete();
        return parent::delete(); // TODO: Change the autogenerated stub
    }
}
