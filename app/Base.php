<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Collections\Collection;

class Base extends Model
{
    public function newCollection(array $models = [])
    {
        return new Collection($models);
    }
}
