<?php

namespace schmunk42\sakila\models;

use Yii;

/**
 * This is the base-model class for table "film_category".
 *
 * @property integer $film_id
 * @property integer $category_id
 * @property string $last_update
 *
 * @property Category $category
 * @property Film $film
 */
class FilmCategoryBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'film_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['film_id', 'category_id', 'last_update'], 'required'],
            [['film_id', 'category_id'], 'integer'],
            [['last_update'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'film_id' => 'Film ID',
            'category_id' => 'Category ID',
            'last_update' => 'Last Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilm()
    {
        return $this->hasOne(Film::className(), ['film_id' => 'film_id']);
    }
}
