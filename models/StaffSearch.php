<?php

namespace schmunk42\sakila\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use schmunk42\sakila\models\Staff;

/**
 * StaffSearch represents the model behind the search form about Staff.
 */
class StaffSearch extends Model
{
	public $staff_id;
	public $first_name;
	public $last_name;
	public $address_id;
	public $picture;
	public $email;
	public $store_id;
	public $active;
	public $username;
	public $password;
	public $last_update;

	public function rules()
	{
		return [
			[['staff_id', 'address_id', 'store_id', 'active'], 'integer'],
			[['first_name', 'last_name', 'picture', 'email', 'username', 'password', 'last_update'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'staff_id' => 'Staff ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'address_id' => 'Address ID',
			'picture' => 'Picture',
			'email' => 'Email',
			'store_id' => 'Store ID',
			'active' => 'Active',
			'username' => 'Username',
			'password' => 'Password',
			'last_update' => 'Last Update',
		];
	}

	public function search($params)
	{
		$query = Staff::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'staff_id');
		$this->addCondition($query, 'first_name', true);
		$this->addCondition($query, 'last_name', true);
		$this->addCondition($query, 'address_id');
		$this->addCondition($query, 'picture', true);
		$this->addCondition($query, 'email', true);
		$this->addCondition($query, 'store_id');
		$this->addCondition($query, 'active');
		$this->addCondition($query, 'username', true);
		$this->addCondition($query, 'password', true);
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
