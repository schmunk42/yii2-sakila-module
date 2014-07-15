<?php

namespace schmunk42\sakila\models;

use Yii;

/**
 * This is the model class for table "inventory".
 */
class Inventory extends InventoryBase
{
    public function getLabel(){
        return ($this->film) ? $this->film->title." @".$this->store_id : '#'.$this->film_id;
    }
}
