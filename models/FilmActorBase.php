<?php

namespace schmunk42\sakila\models;

use Yii;

/**
 * This is the base-model class for table "film_actor".
 *
 * @property integer $actor_id
 * @property integer $film_id
 * @property string $last_update
 *
 * @property Actor $actor
 * @property Film $film
 */
class FilmActorBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'film_actor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['actor_id', 'film_id', 'last_update'], 'required'],
            [['actor_id', 'film_id'], 'integer'],
            [['last_update'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'actor_id' => 'Actor ID',
            'film_id' => 'Film ID',
            'last_update' => 'Last Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActor()
    {
        return $this->hasOne(Actor::className(), ['actor_id' => 'actor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilm()
    {
        return $this->hasOne(Film::className(), ['film_id' => 'film_id']);
    }
}
