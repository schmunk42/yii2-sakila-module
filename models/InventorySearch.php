<?php

namespace schmunk42\sakila\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use schmunk42\sakila\models\Inventory;

/**
 * InventorySearch represents the model behind the search form about Inventory.
 */
class InventorySearch extends Model
{
	public $inventory_id;
	public $film_id;
	public $store_id;
	public $last_update;

	public function rules()
	{
		return [
			[['inventory_id', 'film_id', 'store_id'], 'integer'],
			[['last_update'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'inventory_id' => 'Inventory ID',
			'film_id' => 'Film ID',
			'store_id' => 'Store ID',
			'last_update' => 'Last Update',
		];
	}

	public function search($params)
	{
		$query = Inventory::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'inventory_id');
		$this->addCondition($query, 'film_id');
		$this->addCondition($query, 'store_id');
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
