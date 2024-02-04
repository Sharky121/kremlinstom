<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Access;
use Illuminate\Support\Facades\Auth;

class Permission extends Base
{
    protected $table='permissions';
    protected $fillable=['title'];
    public $timestamps = false;


}
