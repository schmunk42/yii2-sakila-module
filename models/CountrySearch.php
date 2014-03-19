<?php

namespace schmunk42\sakila\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use schmunk42\sakila\models\Country;

/**
 * CountrySearch represents the model behind the search form about Country.
 */
class CountrySearch extends Model
{
	public $country_id;
	public $country;
	public $last_update;

	public function rules()
	{
		return [
			[['country_id'], 'integer'],
			[['country', 'last_update'], 'safe'],
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

	public function search($params)
	{
		$query = Country::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'country_id');
		$this->addCondition($query, 'country', true);
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
