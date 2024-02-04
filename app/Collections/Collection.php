<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 07.08.16
 * Time: 14:14
 */

namespace App\Collections;
use Illuminate\Database\Eloquent\Collection AS col;

class Collection extends col
{

    public function delete()
    {
        foreach ($this->items as $item)
            $item->delete();
    }




}