<?php

namespace schmunk42\sakila\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use schmunk42\sakila\models\Address;

/**
 * AddressSearch represents the model behind the search form about Address.
 */
class AddressSearch extends Model
{
	public $address_id;
	public $address;
	public $address2;
	public $district;
	public $city_id;
	public $postal_code;
	public $phone;
	public $last_update;

	public function rules()
	{
		return [
			[['address_id', 'city_id'], 'integer'],
			[['address', 'address2', 'district', 'postal_code', 'phone', 'last_update'], 'safe'],
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

	public function search($params)
	{
		$query = Address::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'address_id');
		$this->addCondition($query, 'address', true);
		$this->addCondition($query, 'address2', true);
		$this->addCondition($query, 'district', true);
		$this->addCondition($query, 'city_id');
		$this->addCondition($query, 'postal_code', true);
		$this->addCondition($query, 'phone', true);
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
