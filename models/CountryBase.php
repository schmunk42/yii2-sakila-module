<?php

namespace schmunk42\sakila\models;

use Yii;

/**
 * This is the base-model class for table "country".
 *
 * @property integer $country_id
 * @property string $country
 * @property string $last_update
 *
 * @property City[] $cities
 */
class CountryBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country'], 'required'],
            [['last_update'], 'safe'],
            [['country'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'country_id' => 'Country ID',
            'country' => 'Country',
            'last_update' => 'Last Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::className(), ['country_id' => 'country_id']);
    }
}
