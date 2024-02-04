<?php

namespace App;

class ContentBlock extends Base
{
    protected $table = 'content_blocks';
    protected $fillable = ['title','sort','content'];
    public $timestamps = false;

    public function pictures(){
        return $this->hasMany('App\Pictures','note_id')->where('link','=','content_block')->orderby('sort');
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
