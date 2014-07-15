<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\Rental $model
*/

$this->title = 'Rental View ' . $model->rental_id . '';
$this->params['breadcrumbs'][] = ['label' => 'Rentals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rental_id, 'url' => ['view', 'id' => $model->rental_id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="rental-view">

    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Edit', ['update', 'id' => $model->rental_id],
        ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> New', ['create'], ['class' => 'btn
        btn-success']) ?>
    </p>

        <p class='pull-right'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> List', ['index'], ['class'=>'btn btn-default']) ?>
    </p><div class='clearfix'></div> 

    
    <?php $this->beginBlock('schmunk42\sakila\models\Rental'); ?>

    <h3>
        <?= $model->rental_id ?>    </h3>

    <?php echo DetailView::widget([
    'model' => $model,
    'attributes' => [
    'rental_id',
'rental_date',
[
    'format'=>'html',
    'attribute'=>'inventory_id',
    'value' => Html::a($model->getInventory()->one()?$model->getInventory()->one()->label:'', ['inventory/view', 'id' => $model->inventory_id]),
],
[
    'format'=>'html',
    'attribute'=>'customer_id',
    'value' => Html::a($model->getCustomer()->one()?$model->getCustomer()->one()->label:'', ['customer/view', 'id' => $model->customer_id]),
],
'return_date',
[
    'format'=>'html',
    'attribute'=>'staff_id',
    'value' => Html::a($model->getStaff()->one()?$model->getStaff()->one()->staff_id:'', ['staff/view', 'id' => $model->staff_id]),
],
'last_update',
    ],
    ]); ?>

    <hr/>

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'id' => $model->rental_id],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
    'data-method' => 'post',
    ]); ?>

    <?php $this->endBlock(); ?>


    
<?php $this->beginBlock('Payments'); ?>
<p class='pull-left'>
</p>
<p class='pull-right'>
  <?= \yii\helpers\Html::a(
            'New Payment',
            ['payment/create', 'Payment'=>['rental_id'=>$model->rental_id]],
            ['class'=>'btn btn-default btn-xs']
        ) ?>
  <?= \yii\helpers\Html::a(
            'List All Payments',
            ['payment/index'],
            ['class'=>'btn btn-default btn-xs']
        ) ?>
</p><div class='clearfix'></div>
<?php Pjax::begin() ?>
<?= \yii\grid\GridView::widget([
    'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getPayments(), 'pagination' => ['pageSize' => 10]]),
    'columns' => [			'payment_id',
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
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "rental_id",
            "value" => function($model){
                if ($rel = $model->getRental()->one()) {
                    return yii\helpers\Html::a($rel->rental_id,["rental/view","id" => $rel->rental_id],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
],
			'amount',
			'payment_date',
[
    'class'      => 'yii\grid\ActionColumn',
    'template'   => '{view} {update}',
    'buttons'    => [
        
    ],
    'controller' => 'payment'
],]
]);?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


    <?=
    \yii\bootstrap\Tabs::widget(
                 [
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> Rental',
    'content' => $this->blocks['schmunk42\sakila\models\Rental'],
    'active'  => true,
],[
    'label'   => '<small><span class="glyphicon glyphicon-paperclip"></span> Payments</small>',
    'content' => $this->blocks['Payments'],
    'active'  => false,
], ]
                 ]
    );
    ?></div>

