<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var schmunk42\sakila\models\Inventory $model
 */

$this->title = 'Inventory <small>View ' . $model->inventory_id . '</small>';
$this->params['breadcrumbs'][] = ['label' => 'Inventories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-view">

	<h1><?= $this->title ?></h1>

	<p>
		<?= Html::a('Edit', ['update', 'id' => $model->inventory_id], ['class' => 'btn btn-primary']) ?>
		<?php echo Html::a('Delete', ['delete', 'id' => $model->inventory_id], [
			'class' => 'btn btn-danger',
			'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
			'data-method' => 'post',
		]); ?>
	</p>

    
    <?php $this->beginBlock('schmunk42\sakila\models\Inventory'); ?>
    <p class='pull-right'><?= \yii\helpers\Html::a('Inventory', ['inventory/index'], ['class'=>'btn btn-primary']) ?></p>
	<?php echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'inventory_id',
['format'=>'raw','attribute'=>'film_id', 'value'=> \yii\helpers\Html::a($model->film_id, ['film/view', 'id'=>$model->film_id])],['format'=>'raw','attribute'=>'store_id', 'value'=> \yii\helpers\Html::a($model->store_id, ['store/view', 'id'=>$model->store_id])],			'last_update',
		],
	]); ?>
    <?php $this->endBlock(); ?>
    <?php $this->beginBlock('Rentals'); ?><?php \yii\widgets\Pjax::begin() ?><p class='pull-right'><?= \yii\helpers\Html::a('Rentals', ['rental/index'], ['class'=>'btn btn-primary']) ?></p><?php
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
    'label'   => 'Inventory',
    'content' => $this->blocks['schmunk42\sakila\models\Inventory'],
    'active'  => true,
],[
    'label'   => 'Rentals',
    'content' => $this->blocks['Rentals'],
    'active'  => false,
], ]
                 ]
    );
    ?></div>
