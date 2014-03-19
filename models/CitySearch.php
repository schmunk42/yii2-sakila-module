<?php

namespace schmunk42\sakila\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use schmunk42\sakila\models\City;

/**
 * CitySearch represents the model behind the search form about City.
 */
class CitySearch extends Model
{
	public $city_id;
	public $city;
	public $country_id;
	public $last_update;

	public function rules()
	{
		return [
			[['city_id', 'country_id'], 'integer'],
			[['city', 'last_update'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'city_id' => 'City ID',
			'city' => 'City',
			'country_id' => 'Country ID',
			'last_update' => 'Last Update',
		];
	}

	public function search($params)
	{
		$query = City::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'city_id');
		$this->addCondition($query, 'city', true);
		$this->addCondition($query, 'country_id');
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
