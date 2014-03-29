<?php

namespace schmunk42\sakila\models;

use Yii;

/**
 * This is the base-model class for table "sales_by_film_category".
 *
 * @property string $category
 * @property string $total_sales
 */
class SalesByFilmCategoryBase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sales_by_film_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category'], 'required'],
            [['total_sales'], 'number'],
            [['category'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category' => Yii::t('app', 'Category'),
            'total_sales' => Yii::t('app', 'Total Sales'),
        ];
    }
}
