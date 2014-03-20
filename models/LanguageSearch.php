<?php

namespace schmunk42\sakila\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use schmunk42\sakila\models\Language;

/**
 * LanguageSearch represents the model behind the search form about Language.
 */
class LanguageSearch extends Model
{
	public $language_id;
	public $name;
	public $last_update;

	public function rules()
	{
		return [
			[['language_id'], 'integer'],
			[['name', 'last_update'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'language_id' => 'Language ID',
			'name' => 'Name',
			'last_update' => 'Last Update',
		];
	}

	public function search($params)
	{
		$query = Language::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'language_id');
		$this->addCondition($query, 'name', true);
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
