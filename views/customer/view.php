<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var schmunk42\sakila\models\Customer $model
 */

$this->title = 'Customer <small>View ' . $model->customer_id . '</small>';
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-view">

	<h1><?= $this->title ?></h1>

	<p>
		<?= Html::a('Edit', ['update', 'id' => $model->customer_id], ['class' => 'btn btn-primary']) ?>
		<?php echo Html::a('Delete', ['delete', 'id' => $model->customer_id], [
			'class' => 'btn btn-danger',
			'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
			'data-method' => 'post',
		]); ?>
	</p>

    
    <?php $this->beginBlock('schmunk42\sakila\models\Customer'); ?>
    <p class='pull-right'><?= \yii\helpers\Html::a('Customer', ['customer/index'], ['class'=>'btn btn-primary']) ?></p>
	<?php echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'customer_id',
['format'=>'raw','attribute'=>'store_id', 'value'=> \yii\helpers\Html::a($model->store_id, ['store/view', 'id'=>$model->store_id])],			'first_name',
			'last_name',
			'email:email',
['format'=>'raw','attribute'=>'address_id', 'value'=> \yii\helpers\Html::a($model->address_id, ['address/view', 'id'=>$model->address_id])],			'active',
			'create_date',
			'last_update',
		],
	]); ?>
    <?php $this->endBlock(); ?>
    <?php $this->beginBlock('Payments'); ?><?php \yii\widgets\Pjax::begin() ?><p class='pull-right'><?= \yii\helpers\Html::a('Payments', ['payment/index'], ['class'=>'btn btn-primary']) ?></p><?php
$provider = new \yii\data\ActiveDataProvider([
    'query' => $model->getPayments(),
    'pagination' => [
        'pageSize' => 10,
    ],
]);
?>
<?php if($provider->count != 0): ?>
    <?= \yii\grid\GridView::widget([
            'dataProvider' => $provider,
            'columns' => array (
  0 => 'payment_id',
  1 => 'customer.last_name',
  2 => 'staff_id',
  3 => 'rental_id',
  4 => 'amount',
  5 => 'payment_date',
  6 => 
  array (
    'class' => 'yii\\grid\\ActionColumn',
    'controller' => 'payment',
  ),
)
        ]); ?>
<?php endif; ?><?php \yii\widgets\Pjax::end() ?><?php $this->endBlock() ?><?php $this->beginBlock('Rentals'); ?><?php \yii\widgets\Pjax::begin() ?><p class='pull-right'><?= \yii\helpers\Html::a('Rentals', ['rental/index'], ['class'=>'btn btn-primary']) ?></p><?php
$provider = new \yii\data\ActiveDataProvider([
    'query' => $model->getRentals(),
    'pagination' => [
        'pageSize' => 10,
    ],
]);
?>
<?php if($provider->count != 0): ?>
    <?= \yii\grid\GridView::widget([
            'dataProvider' => $provider,
            'columns' => array (
  0 => 'rental_id',
  1 => 'rental_date',
  2 => 'inventory.film.title',
  3 => 'customer.last_name',
  4 => 'return_date',
  5 => 'staff_id',
  6 => 
  array (
    'class' => 'yii\\grid\\ActionColumn',
    'controller' => 'rental',
  ),
)
        ]); ?>
<?php endif; ?><?php \yii\widgets\Pjax::end() ?><?php $this->endBlock() ?>
    <?=
    \yii\bootstrap\Tabs::widget(
                 [
                     'items' => [ [
    'label'   => 'Customer',
    'content' => $this->blocks['schmunk42\sakila\models\Customer'],
    'active'  => true,
],[
    'label'   => 'Payments',
    'content' => $this->blocks['Payments'],
    'active'  => false,
],[
    'label'   => 'Rentals',
    'content' => $this->blocks['Rentals'],
    'active'  => false,
], ]
                 ]
    );
    ?></div>
