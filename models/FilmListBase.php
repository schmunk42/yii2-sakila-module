<?php

namespace schmunk42\sakila\models;

use Yii;

/**
 * This is the base-model class for table "film_list".
 *
 * @property integer $FID
 * @property string $title
 * @property string $description
 * @property string $category
 * @property string $price
 * @property integer $length
 * @property string $rating
 * @property string $actors
 */
class FilmListBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'film_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FID', 'length'], 'integer'],
            [['description', 'rating'], 'string'],
            [['category'], 'required'],
            [['price'], 'number'],
            [['title'], 'string', 'max' => 255],
            [['category'], 'string', 'max' => 25],
            [['actors'], 'string', 'max' => 341]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'FID' => Yii::t('app', 'Fid'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'category' => Yii::t('app', 'Category'),
            'price' => Yii::t('app', 'Price'),
            'length' => Yii::t('app', 'Length'),
            'rating' => Yii::t('app', 'Rating'),
            'actors' => Yii::t('app', 'Actors'),
        ];
    }
}
