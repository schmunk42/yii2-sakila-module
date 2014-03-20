<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var schmunk42\sakila\models\Rental $model
 */

$this->title = 'Rental <small>View ' . $model->rental_id . '</small>';
$this->params['breadcrumbs'][] = ['label' => 'Rentals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rental-view">

	<h1><?= $this->title ?></h1>

	<p>
		<?= Html::a('Edit', ['update', 'id' => $model->rental_id], ['class' => 'btn btn-primary']) ?>
		<?php echo Html::a('Delete', ['delete', 'id' => $model->rental_id], [
			'class' => 'btn btn-danger',
			'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
			'data-method' => 'post',
		]); ?>
	</p>

    
    <?php $this->beginBlock('schmunk42\sakila\models\Rental'); ?>
    <p class='pull-right'><?= \yii\helpers\Html::a('Rental', ['rental/index'], ['class'=>'btn btn-primary']) ?></p>
	<?php echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'rental_id',
			'rental_date',
['format'=>'raw','attribute'=>'inventory_id', 'value'=> \yii\helpers\Html::a($model->inventory_id, ['inventory/view', 'id'=>$model->inventory_id])],['format'=>'raw','attribute'=>'customer_id', 'value'=> \yii\helpers\Html::a($model->customer_id, ['customer/view', 'id'=>$model->customer_id])],			'return_date',
['format'=>'raw','attribute'=>'staff_id', 'value'=> \yii\helpers\Html::a($model->staff_id, ['staff/view', 'id'=>$model->staff_id])],			'last_update',
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
<?php endif; ?><?php \yii\widgets\Pjax::end() ?><?php $this->endBlock() ?>
    <?=
    \yii\bootstrap\Tabs::widget(
                 [
                     'items' => [ [
    'label'   => 'Rental',
    'content' => $this->blocks['schmunk42\sakila\models\Rental'],
    'active'  => true,
],[
    'label'   => 'Payments',
    'content' => $this->blocks['Payments'],
    'active'  => false,
], ]
                 ]
    );
    ?></div>
