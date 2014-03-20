<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var schmunk42\sakila\models\Staff $model
 */

$this->title = 'Staff <small>View ' . $model->staff_id . '</small>';
$this->params['breadcrumbs'][] = ['label' => 'Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-view">

	<h1><?= $this->title ?></h1>

	<p>
		<?= Html::a('Edit', ['update', 'id' => $model->staff_id], ['class' => 'btn btn-primary']) ?>
		<?php echo Html::a('Delete', ['delete', 'id' => $model->staff_id], [
			'class' => 'btn btn-danger',
			'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
			'data-method' => 'post',
		]); ?>
	</p>

    
    <?php $this->beginBlock('schmunk42\sakila\models\Staff'); ?>
    <p class='pull-right'><?= \yii\helpers\Html::a('Staff', ['staff/index'], ['class'=>'btn btn-primary']) ?></p>
	<?php echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'staff_id',
			'first_name',
			'last_name',
['format'=>'raw','attribute'=>'address_id', 'value'=> \yii\helpers\Html::a($model->address_id, ['address/view', 'id'=>$model->address_id])],			'picture',
			'email:email',
['format'=>'raw','attribute'=>'store_id', 'value'=> \yii\helpers\Html::a($model->store_id, ['store/view', 'id'=>$model->store_id])],			'active',
			'username',
			'password',
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
<?php endif; ?><?php \yii\widgets\Pjax::end() ?><?php $this->endBlock() ?><?php $this->beginBlock('Stores'); ?><?php \yii\widgets\Pjax::begin() ?><p class='pull-right'><?= \yii\helpers\Html::a('Stores', ['store/index'], ['class'=>'btn btn-primary']) ?></p><?php
$provider = new \yii\data\ActiveDataProvider([
    'query' => $model->getStores(),
    'pagination' => [
        'pageSize' => 10,
    ],
]);
?>
<?php if($provider->count != 0): ?>
    <?= \yii\grid\GridView::widget([
            'dataProvider' => $provider,
            'columns' => array (
  0 => 'store_id',
  1 => 'manager_staff_id',
  2 => 'address_id',
  3 => 
  array (
    'class' => 'yii\\grid\\ActionColumn',
    'controller' => 'store',
  ),
)
        ]); ?>
<?php endif; ?><?php \yii\widgets\Pjax::end() ?><?php $this->endBlock() ?>
    <?=
    \yii\bootstrap\Tabs::widget(
                 [
                     'items' => [ [
    'label'   => 'Staff',
    'content' => $this->blocks['schmunk42\sakila\models\Staff'],
    'active'  => true,
],[
    'label'   => 'Payments',
    'content' => $this->blocks['Payments'],
    'active'  => false,
],[
    'label'   => 'Rentals',
    'content' => $this->blocks['Rentals'],
    'active'  => false,
],[
    'label'   => 'Stores',
    'content' => $this->blocks['Stores'],
    'active'  => false,
], ]
                 ]
    );
    ?></div>
