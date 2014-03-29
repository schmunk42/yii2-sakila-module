<?php

namespace schmunk42\sakila\models;

use Yii;

/**
 * This is the base-model class for table "customer_list".
 *
 * @property integer $ID
 * @property string $name
 * @property string $address
 * @property string $zip_code
 * @property string $phone
 * @property string $city
 * @property string $country
 * @property string $notes
 * @property integer $SID
 */
class CustomerListBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'SID'], 'integer'],
            [['address', 'phone', 'city', 'country', 'SID'], 'required'],
            [['name'], 'string', 'max' => 91],
            [['address', 'city', 'country'], 'string', 'max' => 50],
            [['zip_code'], 'string', 'max' => 10],
            [['phone'], 'string', 'max' => 20],
            [['notes'], 'string', 'max' => 6]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'address' => Yii::t('app', 'Address'),
            'zip_code' => Yii::t('app', 'Zip Code'),
            'phone' => Yii::t('app', 'Phone'),
            'city' => Yii::t('app', 'City'),
            'country' => Yii::t('app', 'Country'),
            'notes' => Yii::t('app', 'Notes'),
            'SID' => Yii::t('app', 'Sid'),
        ];
    }
}
