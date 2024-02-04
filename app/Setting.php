<?php

namespace App;
use DB;


class Setting extends Base
{
    protected $table = 'settings';
    protected $fillable = ['title','code','value'];

}
