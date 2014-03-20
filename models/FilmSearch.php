<?php

namespace schmunk42\sakila\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use schmunk42\sakila\models\Film;

/**
 * FilmSearch represents the model behind the search form about Film.
 */
class FilmSearch extends Model
{
	public $film_id;
	public $title;
	public $description;
	public $release_year;
	public $language_id;
	public $original_language_id;
	public $rental_duration;
	public $rental_rate;
	public $length;
	public $replacement_cost;
	public $rating;
	public $special_features;
	public $last_update;

	public function rules()
	{
		return [
			[['film_id', 'language_id', 'original_language_id', 'rental_duration', 'length'], 'integer'],
			[['title', 'description', 'release_year', 'rating', 'special_features', 'last_update'], 'safe'],
			[['rental_rate', 'replacement_cost'], 'number'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'film_id' => 'Film ID',
			'title' => 'Title',
			'description' => 'Description',
			'release_year' => 'Release Year',
			'language_id' => 'Language ID',
			'original_language_id' => 'Original Language ID',
			'rental_duration' => 'Rental Duration',
			'rental_rate' => 'Rental Rate',
			'length' => 'Length',
			'replacement_cost' => 'Replacement Cost',
			'rating' => 'Rating',
			'special_features' => 'Special Features',
			'last_update' => 'Last Update',
		];
	}

	public function search($params)
	{
		$query = Film::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'film_id');
		$this->addCondition($query, 'title', true);
		$this->addCondition($query, 'description', true);
		$this->addCondition($query, 'release_year');
		$this->addCondition($query, 'language_id');
		$this->addCondition($query, 'original_language_id');
		$this->addCondition($query, 'rental_duration');
		$this->addCondition($query, 'rental_rate');
		$this->addCondition($query, 'length');
		$this->addCondition($query, 'replacement_cost');
		$this->addCondition($query, 'rating', true);
		$this->addCondition($query, 'special_features', true);
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
