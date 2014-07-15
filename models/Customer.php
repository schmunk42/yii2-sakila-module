<?php

namespace schmunk42\sakila\models;

use Yii;

/**
 * This is the model class for table "customer".
 */
class Customer extends CustomerBase
{
    public function getLabel(){
        return $this->first_name.' '.$this->last_name;
    }
}
