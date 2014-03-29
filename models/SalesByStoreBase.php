<?php

namespace schmunk42\sakila\models;

use Yii;

/**
 * This is the base-model class for table "sales_by_store".
 *
 * @property string $store
 * @property string $manager
 * @property string $total_sales
 */
class SalesByStoreBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sales_by_store';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['total_sales'], 'number'],
            [['store'], 'string', 'max' => 101],
            [['manager'], 'string', 'max' => 91]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'store' => Yii::t('app', 'Store'),
            'manager' => Yii::t('app', 'Manager'),
            'total_sales' => Yii::t('app', 'Total Sales'),
        ];
    }
}
