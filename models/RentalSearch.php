<?php

namespace schmunk42\sakila\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use schmunk42\sakila\models\Rental;

/**
 * RentalSearch represents the model behind the search form about Rental.
 */
class RentalSearch extends Model
{
	public $rental_id;
	public $rental_date;
	public $inventory_id;
	public $customer_id;
	public $return_date;
	public $staff_id;
	public $last_update;

	public function rules()
	{
		return [
			[['rental_id', 'inventory_id', 'customer_id', 'staff_id'], 'integer'],
			[['rental_date', 'return_date', 'last_update'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'rental_id' => 'Rental ID',
			'rental_date' => 'Rental Date',
			'inventory_id' => 'Inventory ID',
			'customer_id' => 'Customer ID',
			'return_date' => 'Return Date',
			'staff_id' => 'Staff ID',
			'last_update' => 'Last Update',
		];
	}

	public function search($params)
	{
		$query = Rental::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'rental_id');
		$this->addCondition($query, 'rental_date');
		$this->addCondition($query, 'inventory_id');
		$this->addCondition($query, 'customer_id');
		$this->addCondition($query, 'return_date');
		$this->addCondition($query, 'staff_id');
		$this->addCondition($query, 'last_update');
		return $dataProvider;
	}

	protected function addCondition($query, $attribute, $partialMatch = false)
	{
		$value = $this->$attribute;
		if (trim($value) === '') {
			return;
		}
		if ($partialMatch) {
			$value = '%' . strtr($value, ['%'=>'\%', '_'=>'\_', '\\'=>'\\\\']) . '%';
			$query->andWhere(['like', $attribute, $value]);
		} else {
			$query->andWhere([$attribute => $value]);
		}
	}
}
