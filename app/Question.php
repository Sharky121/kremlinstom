<?php

namespace App;

class Question extends Base
{
    protected $table = 'questions';
    protected $fillable = ['author','content','dop_content','public','sort','date','phone','email','faq'];
    protected $dates = ['date'];
    public $timestamps = false;

}
