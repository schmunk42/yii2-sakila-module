<?php

namespace schmunk42\sakila\models;

use Yii;

/**
 * This is the model class for table "actor".
 */
class Actor extends ActorBase
{
    function getLabel(){
        return $this->first_name.' '.$this->last_name;
    }
}
