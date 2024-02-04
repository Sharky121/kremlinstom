<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    protected $fillable = ['title','address','grafik','phone','coords'];
    public $timestamps = false;

}
