<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Access;
use Illuminate\Support\Facades\Auth;

class Menu extends Base
{
    protected $table='menu';
    protected $fillable=['title','url','sort'];
    public $timestamps = false;


}
