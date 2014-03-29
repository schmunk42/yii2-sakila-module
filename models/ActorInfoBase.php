<?php

namespace schmunk42\sakila\models;

use Yii;

/**
 * This is the base-model class for table "actor_info".
 *
 * @property integer $actor_id
 * @property string $first_name
 * @property string $last_name
 * @property string $film_info
 */
class ActorInfoBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'actor_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['actor_id'], 'integer'],
            [['first_name', 'last_name'], 'required'],
            [['first_name', 'last_name'], 'string', 'max' => 45],
            [['film_info'], 'string', 'max' => 341]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'actor_id' => Yii::t('app', 'Actor ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'film_info' => Yii::t('app', 'Film Info'),
        ];
    }
}
