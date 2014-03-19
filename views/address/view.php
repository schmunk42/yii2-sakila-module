<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var schmunk42\sakila\models\Address $model
 */

$this->title = $model->address_id;
$this->params['breadcrumbs'][] = ['label' => 'Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Update', ['update', 'id' => $model->address_id], ['class' => 'btn btn-primary']) ?>
		<?php echo Html::a('Delete', ['delete', 'id' => $model->address_id], [
			'class' => 'btn btn-danger',
			'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
			'data-method' => 'post',
		]); ?>
	</p>

	<?php echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'address_id',
			'address',
			'address2',
			'district',
			'city_id',
			'postal_code',
			'phone',
			'last_update',
		],
	]); ?>

    <h3><?= \yii\helpers\Html::a('City', ['city/index']) ?></h3><?php
$provider = new \yii\data\ActiveDataProvider([
    'query' => $model->getCity(),
    'pagination' => [
        'pageSize' => 5,
    ],
]);
?>
<?php if($provider->count != 0): ?>
    <?= \yii\grid\GridView::widget(['dataProvider' => $provider,]); ?>
<?php endif; ?><h3><?= \yii\helpers\Html::a('Customers', ['customer/index']) ?></h3><?php
$provider = new \yii\data\ActiveDataProvider([
    'query' => $model->getCustomers(),
    'pagination' => [
        'pageSize' => 5,
    ],
]);
?>
<?php if($provider->count != 0): ?>
    <?= \yii\grid\GridView::widget(['dataProvider' => $provider,]); ?>
<?php endif; ?><h3><?= \yii\helpers\Html::a('Staff', ['staff/index']) ?></h3><?php
$provider = new \yii\data\ActiveDataProvider([
    'query' => $model->getStaff(),
    'pagination' => [
        'pageSize' => 5,
    ],
]);
?>
<?php if($provider->count != 0): ?>
    <?= \yii\grid\GridView::widget(['dataProvider' => $provider,]); ?>
<?php endif; ?><h3><?= \yii\helpers\Html::a('Stores', ['store/index']) ?></h3><?php
$provider = new \yii\data\ActiveDataProvider([
    'query' => $model->getStores(),
    'pagination' => [
        'pageSize' => 5,
    ],
]);
?>
<?php if($provider->count != 0): ?>
    <?= \yii\grid\GridView::widget(['dataProvider' => $provider,]); ?>
<?php endif; ?>
</div>
