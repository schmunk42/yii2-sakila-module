<?php

namespace schmunk42\sakila\models;

/**
 * This is the model class for table "address".
 *
 * @property integer $address_id
 * @property string $address
 * @property string $address2
 * @property string $district
 * @property integer $city_id
 * @property string $postal_code
 * @property string $phone
 * @property string $last_update
 *
 * @property City $city
 * @property Customer[] $customers
 * @property Staff[] $staff
 * @property Store[] $stores
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address', 'district', 'city_id', 'phone', 'last_update'], 'required'],
            [['city_id'], 'integer'],
            [['last_update'], 'safe'],
            [['address', 'address2'], 'string', 'max' => 50],
            [['district', 'phone'], 'string', 'max' => 20],
            [['postal_code'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'address_id' => 'Address ID',
            'address' => 'Address',
            'address2' => 'Address2',
            'district' => 'District',
            'city_id' => 'City ID',
            'postal_code' => 'Postal Code',
            'phone' => 'Phone',
            'last_update' => 'Last Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['city_id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['address_id' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasMany(Staff::className(), ['address_id' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStores()
    {
        return $this->hasMany(Store::className(), ['address_id' => 'address_id']);
    }
}
