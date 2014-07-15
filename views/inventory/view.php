<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\Inventory $model
*/

$this->title = 'Inventory View ' . $model->inventory_id . '';
$this->params['breadcrumbs'][] = ['label' => 'Inventories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->inventory_id, 'url' => ['view', 'id' => $model->inventory_id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="inventory-view">

    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Edit', ['update', 'id' => $model->inventory_id],
        ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> New', ['create'], ['class' => 'btn
        btn-success']) ?>
    </p>

        <p class='pull-right'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> List', ['index'], ['class'=>'btn btn-default']) ?>
    </p><div class='clearfix'></div> 

    
    <?php $this->beginBlock('schmunk42\sakila\models\Inventory'); ?>

    <h3>
        <?= $model->label ?>    </h3>

    <?php echo DetailView::widget([
    'model' => $model,
    'attributes' => [
    'inventory_id',
[
    'format'=>'html',
    'attribute'=>'film_id',
    'value' => Html::a($model->getFilm()->one()?$model->getFilm()->one()->title:'', ['film/view', 'id' => $model->film_id]),
],
[
    'format'=>'html',
    'attribute'=>'store_id',
    'value' => Html::a($model->getStore()->one()?$model->getStore()->one()->store_id:'', ['store/view', 'id' => $model->store_id]),
],
'last_update',
    ],
    ]); ?>

    <hr/>

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'id' => $model->inventory_id],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
    'data-method' => 'post',
    ]); ?>

    <?php $this->endBlock(); ?>


    
<?php $this->beginBlock('Rentals'); ?>
<p class='pull-left'>
</p>
<p class='pull-right'>
  <?= \yii\helpers\Html::a(
            'New Rental',
            ['rental/create', 'Rental'=>['inventory_id'=>$model->inventory_id]],
            ['class'=>'btn btn-default btn-xs']
        ) ?>
  <?= \yii\helpers\Html::a(
            'List All Rentals',
            ['rental/index'],
            ['class'=>'btn btn-default btn-xs']
        ) ?>
</p><div class='clearfix'></div>
<?php Pjax::begin() ?>
<?= \yii\grid\GridView::widget([
    'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getRentals(), 'pagination' => ['pageSize' => 10]]),
    'columns' => [			'rental_id',
			'rental_date',
[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "inventory_id",
            "value" => function($model){
                if ($rel = $model->getInventory()->one()) {
                    return yii\helpers\Html::a($rel->label,["inventory/view","id" => $rel->inventory_id],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
],
[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "customer_id",
            "value" => function($model){
                if ($rel = $model->getCustomer()->one()) {
                    return yii\helpers\Html::a($rel->label,["customer/view","id" => $rel->customer_id],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
],
			'return_date',
[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "staff_id",
            "value" => function($model){
                if ($rel = $model->getStaff()->one()) {
                    return yii\helpers\Html::a($rel->staff_id,["staff/view","id" => $rel->staff_id],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
],
[
    'class'      => 'yii\grid\ActionColumn',
    'template'   => '{view} {update}',
    'buttons'    => [
        
    ],
    'controller' => 'rental'
],]
]);?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


    <?=
    \yii\bootstrap\Tabs::widget(
                 [
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> Inventory',
    'content' => $this->blocks['schmunk42\sakila\models\Inventory'],
    'active'  => true,
],[
    'label'   => '<small><span class="glyphicon glyphicon-paperclip"></span> Rentals</small>',
    'content' => $this->blocks['Rentals'],
    'active'  => false,
], ]
                 ]
    );
    ?></div>

