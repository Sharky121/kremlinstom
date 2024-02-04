<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 07.08.16
 * Time: 14:14
 */

namespace App\Collections;
use App\Collections\Collection AS col;

class CollectionUsers extends col
{

    // синхронизирует записи доступов в таблице
    public function syncAccess()
    {
        foreach ($this->items as $item)
            $item->syncAccess();
    }




}