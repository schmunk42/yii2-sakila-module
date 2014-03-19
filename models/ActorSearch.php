<?php

namespace schmunk42\sakila\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use schmunk42\sakila\models\Actor;

/**
 * ActorSearch represents the model behind the search form about Actor.
 */
class ActorSearch extends Model
{
	public $actor_id;
	public $first_name;
	public $last_name;
	public $last_update;

	public function rules()
	{
		return [
			[['actor_id'], 'integer'],
			[['first_name', 'last_name', 'last_update'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'actor_id' => 'Actor ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'last_update' => 'Last Update',
		];
	}

	public function search($params)
	{
		$query = Actor::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'actor_id');
		$this->addCondition($query, 'first_name', true);
		$this->addCondition($query, 'last_name', true);
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
