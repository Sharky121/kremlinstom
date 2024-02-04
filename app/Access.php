<?php

namespace App;



class Access extends Base
{
    protected $table='access';
    protected $fillable=['user_id','menu_id','read','write','delete'];
    public $timestamps = false;

    public function menu()
    {
        return $this->hasMany('App\Menu');
    }


}
