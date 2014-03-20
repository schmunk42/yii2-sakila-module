<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var schmunk42\sakila\models\Store $model
 */

$this->title = 'Store <small>View ' . $model->store_id . '</small>';
$this->params['breadcrumbs'][] = ['label' => 'Stores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-view">

	<h1><?= $this->title ?></h1>

	<p>
		<?= Html::a('Edit', ['update', 'id' => $model->store_id], ['class' => 'btn btn-primary']) ?>
		<?php echo Html::a('Delete', ['delete', 'id' => $model->store_id], [
			'class' => 'btn btn-danger',
			'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
			'data-method' => 'post',
		]); ?>
	</p>

    
    <?php $this->beginBlock('schmunk42\sakila\models\Store'); ?>
    <p class='pull-right'><?= \yii\helpers\Html::a('Store', ['store/index'], ['class'=>'btn btn-primary']) ?></p>
	<?php echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'store_id',
['format'=>'raw','attribute'=>'manager_staff_id', 'value'=> \yii\helpers\Html::a($model->manager_staff_id, ['staff/view', 'id'=>$model->manager_staff_id])],['format'=>'raw','attribute'=>'address_id', 'value'=> \yii\helpers\Html::a($model->address_id, ['address/view', 'id'=>$model->address_id])],			'last_update',
		],
	]); ?>
    <?php $this->endBlock(); ?>
    <?php $this->beginBlock('Customers'); ?><?php \yii\widgets\Pjax::begin() ?><p class='pull-right'><?= \yii\helpers\Html::a('Customers', ['customer/index'], ['class'=>'btn btn-primary']) ?></p><?php
$provider = new \yii\data\ActiveDataProvider([
    'query' => $model->getCustomers(),
    'pagination' => [
        'pageSize' => 10,
    ],
]);
?>
<?php if($provider->count != 0): ?>
    <?= \yii\grid\GridView::widget([
            'dataProvider' => $provider,
            'columns' => array (
  0 => 'customer_id',
  1 => 'store_id',
  2 => 'first_name',
  3 => 'last_name',
  4 => 'email',
  5 => 'address_id',
  6 => 
  array (
    'class' => 'yii\\grid\\ActionColumn',
    'controller' => 'customer',
  ),
)
        ]); ?>
<?php endif; ?><?php \yii\widgets\Pjax::end() ?><?php $this->endBlock() ?><?php $this->beginBlock('Inventories'); ?><?php \yii\widgets\Pjax::begin() ?><p class='pull-right'><?= \yii\helpers\Html::a('Inventories', ['inventory/index'], ['class'=>'btn btn-primary']) ?></p><?php
$provider = new \yii\data\ActiveDataProvider([
    'query' => $model->getInventories(),
    'pagination' => [
        'pageSize' => 10,
    ],
]);
?>
<?php if($provider->count != 0): ?>
    <?= \yii\grid\GridView::widget([
            'dataProvider' => $provider,
            'columns' => array (
  0 => 'inventory_id',
  1 => 'film.title',
  2 => 'store_id',
  3 => 
  array (
    'class' => 'yii\\grid\\ActionColumn',
    'controller' => 'inventory',
  ),
)
        ]); ?>
<?php endif; ?><?php \yii\widgets\Pjax::end() ?><?php $this->endBlock() ?><?php $this->beginBlock('Staff'); ?><?php \yii\widgets\Pjax::begin() ?><p class='pull-right'><?= \yii\helpers\Html::a('Staff', ['staff/index'], ['class'=>'btn btn-primary']) ?></p><?php
$provider = new \yii\data\ActiveDataProvider([
    'query' => $model->getStaff(),
    'pagination' => [
        'pageSize' => 10,
    ],
]);
?>
<?php if($provider->count != 0): ?>
    <?= \yii\grid\GridView::widget([
            'dataProvider' => $provider,
            'columns' => array (
  0 => 'staff_id',
  1 => 'first_name',
  2 => 'last_name',
  3 => 'address_id',
  4 => 'picture',
  5 => 'email',
  6 => 
  array (
    'class' => 'yii\\grid\\ActionColumn',
    'controller' => 'staff',
  ),
)
        ]); ?>
<?php endif; ?><?php \yii\widgets\Pjax::end() ?><?php $this->endBlock() ?>
    <?=
    \yii\bootstrap\Tabs::widget(
                 [
                     'items' => [ [
    'label'   => 'Store',
    'content' => $this->blocks['schmunk42\sakila\models\Store'],
    'active'  => true,
],[
    'label'   => 'Customers',
    'content' => $this->blocks['Customers'],
    'active'  => false,
],[
    'label'   => 'Inventories',
    'content' => $this->blocks['Inventories'],
    'active'  => false,
],[
    'label'   => 'Staff',
    'content' => $this->blocks['Staff'],
    'active'  => false,
], ]
                 ]
    );
    ?></div>
