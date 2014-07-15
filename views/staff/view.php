<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\Staff $model
*/

$this->title = 'Staff View ' . $model->staff_id . '';
$this->params['breadcrumbs'][] = ['label' => 'Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->staff_id, 'url' => ['view', 'id' => $model->staff_id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="staff-view">

    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Edit', ['update', 'id' => $model->staff_id],
        ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> New', ['create'], ['class' => 'btn
        btn-success']) ?>
    </p>

        <p class='pull-right'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> List', ['index'], ['class'=>'btn btn-default']) ?>
    </p><div class='clearfix'></div> 

    
    <?php $this->beginBlock('schmunk42\sakila\models\Staff'); ?>

    <h3>
        <?= $model->staff_id ?>    </h3>

    <?php echo DetailView::widget([
    'model' => $model,
    'attributes' => [
    'staff_id',
'first_name',
'last_name',
[
    'format'=>'html',
    'attribute'=>'address_id',
    'value' => Html::a($model->getAddress()->one()?$model->getAddress()->one()->address_id:'', ['address/view', 'id' => $model->address_id]),
],
'picture',
'email:email',
[
    'format'=>'html',
    'attribute'=>'store_id',
    'value' => Html::a($model->getStore()->one()?$model->getStore()->one()->store_id:'', ['store/view', 'id' => $model->store_id]),
],
'active',
'username',
'password',
'last_update',
    ],
    ]); ?>

    <hr/>

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'id' => $model->staff_id],
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
            ['payment/create', 'Payment'=>['staff_id'=>$model->staff_id]],
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


<?php $this->beginBlock('Rentals'); ?>
<p class='pull-left'>
</p>
<p class='pull-right'>
  <?= \yii\helpers\Html::a(
            'New Rental',
            ['rental/create', 'Rental'=>['staff_id'=>$model->staff_id]],
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


<?php $this->beginBlock('Stores'); ?>
<p class='pull-left'>
</p>
<p class='pull-right'>
  <?= \yii\helpers\Html::a(
            'New Store',
            ['store/create', 'Store'=>['manager_staff_id'=>$model->staff_id]],
            ['class'=>'btn btn-default btn-xs']
        ) ?>
  <?= \yii\helpers\Html::a(
            'List All Stores',
            ['store/index'],
            ['class'=>'btn btn-default btn-xs']
        ) ?>
</p><div class='clearfix'></div>
<?php Pjax::begin() ?>
<?= \yii\grid\GridView::widget([
    'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getStores(), 'pagination' => ['pageSize' => 10]]),
    'columns' => [			'store_id',
[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "manager_staff_id",
            "value" => function($model){
                if ($rel = $model->getManagerStaff()->one()) {
                    return yii\helpers\Html::a($rel->staff_id,["staff/view","id" => $rel->staff_id],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
],
[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "address_id",
            "value" => function($model){
                if ($rel = $model->getAddress()->one()) {
                    return yii\helpers\Html::a($rel->address_id,["address/view","id" => $rel->address_id],["data-pjax"=>0]);
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
    'controller' => 'store'
],]
]);?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


    <?=
    \yii\bootstrap\Tabs::widget(
                 [
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> Staff',
    'content' => $this->blocks['schmunk42\sakila\models\Staff'],
    'active'  => true,
],[
    'label'   => '<small><span class="glyphicon glyphicon-paperclip"></span> Payments</small>',
    'content' => $this->blocks['Payments'],
    'active'  => false,
],[
    'label'   => '<small><span class="glyphicon glyphicon-paperclip"></span> Rentals</small>',
    'content' => $this->blocks['Rentals'],
    'active'  => false,
],[
    'label'   => '<small><span class="glyphicon glyphicon-paperclip"></span> Stores</small>',
    'content' => $this->blocks['Stores'],
    'active'  => false,
], ]
                 ]
    );
    ?></div>

