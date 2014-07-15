<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\Store $model
*/

$this->title = 'Store View ' . $model->store_id . '';
$this->params['breadcrumbs'][] = ['label' => 'Stores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->store_id, 'url' => ['view', 'id' => $model->store_id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="store-view">

    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Edit', ['update', 'id' => $model->store_id],
        ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> New', ['create'], ['class' => 'btn
        btn-success']) ?>
    </p>

        <p class='pull-right'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> List', ['index'], ['class'=>'btn btn-default']) ?>
    </p><div class='clearfix'></div> 

    
    <?php $this->beginBlock('schmunk42\sakila\models\Store'); ?>

    <h3>
        <?= $model->store_id ?>    </h3>

    <?php echo DetailView::widget([
    'model' => $model,
    'attributes' => [
    'store_id',
[
    'format'=>'html',
    'attribute'=>'manager_staff_id',
    'value' => Html::a($model->getManagerStaff()->one()?$model->getManagerStaff()->one()->staff_id:'', ['staff/view', 'id' => $model->manager_staff_id]),
],
[
    'format'=>'html',
    'attribute'=>'address_id',
    'value' => Html::a($model->getAddress()->one()?$model->getAddress()->one()->address_id:'', ['address/view', 'id' => $model->address_id]),
],
'last_update',
    ],
    ]); ?>

    <hr/>

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'id' => $model->store_id],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
    'data-method' => 'post',
    ]); ?>

    <?php $this->endBlock(); ?>


    
<?php $this->beginBlock('Customers'); ?>
<p class='pull-left'>
</p>
<p class='pull-right'>
  <?= \yii\helpers\Html::a(
            'New Customer',
            ['customer/create', 'Customer'=>['store_id'=>$model->store_id]],
            ['class'=>'btn btn-default btn-xs']
        ) ?>
  <?= \yii\helpers\Html::a(
            'List All Customers',
            ['customer/index'],
            ['class'=>'btn btn-default btn-xs']
        ) ?>
</p><div class='clearfix'></div>
<?php Pjax::begin() ?>
<?= \yii\grid\GridView::widget([
    'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getCustomers(), 'pagination' => ['pageSize' => 10]]),
    'columns' => [			'customer_id',
[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "store_id",
            "value" => function($model){
                if ($rel = $model->getStore()->one()) {
                    return yii\helpers\Html::a($rel->store_id,["store/view","id" => $rel->store_id],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
],
			'first_name',
			'last_name',
			'email:email',
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
			'active',
			'create_date',
[
    'class'      => 'yii\grid\ActionColumn',
    'template'   => '{view} {update}',
    'buttons'    => [
        
    ],
    'controller' => 'customer'
],]
]);?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


<?php $this->beginBlock('Inventories'); ?>
<p class='pull-left'>
</p>
<p class='pull-right'>
  <?= \yii\helpers\Html::a(
            'New Inventory',
            ['inventory/create', 'Inventory'=>['store_id'=>$model->store_id]],
            ['class'=>'btn btn-default btn-xs']
        ) ?>
  <?= \yii\helpers\Html::a(
            'List All Inventories',
            ['inventory/index'],
            ['class'=>'btn btn-default btn-xs']
        ) ?>
</p><div class='clearfix'></div>
<?php Pjax::begin() ?>
<?= \yii\grid\GridView::widget([
    'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getInventories(), 'pagination' => ['pageSize' => 10]]),
    'columns' => [			'inventory_id',
[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "film_id",
            "value" => function($model){
                if ($rel = $model->getFilm()->one()) {
                    return yii\helpers\Html::a($rel->title,["film/view","id" => $rel->film_id],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
],
[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "store_id",
            "value" => function($model){
                if ($rel = $model->getStore()->one()) {
                    return yii\helpers\Html::a($rel->store_id,["store/view","id" => $rel->store_id],["data-pjax"=>0]);
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
    'controller' => 'inventory'
],]
]);?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


<?php $this->beginBlock('Staff'); ?>
<p class='pull-left'>
</p>
<p class='pull-right'>
  <?= \yii\helpers\Html::a(
            'New Staff',
            ['staff/create', 'Staff'=>['store_id'=>$model->store_id]],
            ['class'=>'btn btn-default btn-xs']
        ) ?>
  <?= \yii\helpers\Html::a(
            'List All Staff',
            ['staff/index'],
            ['class'=>'btn btn-default btn-xs']
        ) ?>
</p><div class='clearfix'></div>
<?php Pjax::begin() ?>
<?= \yii\grid\GridView::widget([
    'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getStaff(), 'pagination' => ['pageSize' => 10]]),
    'columns' => [			'staff_id',
			'first_name',
			'last_name',
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
			'picture',
			'email:email',
[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "store_id",
            "value" => function($model){
                if ($rel = $model->getStore()->one()) {
                    return yii\helpers\Html::a($rel->store_id,["store/view","id" => $rel->store_id],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
],
			'active',
			'username',
[
    'class'      => 'yii\grid\ActionColumn',
    'template'   => '{view} {update}',
    'buttons'    => [
        
    ],
    'controller' => 'staff'
],]
]);?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


    <?=
    \yii\bootstrap\Tabs::widget(
                 [
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> Store',
    'content' => $this->blocks['schmunk42\sakila\models\Store'],
    'active'  => true,
],[
    'label'   => '<small><span class="glyphicon glyphicon-paperclip"></span> Customers</small>',
    'content' => $this->blocks['Customers'],
    'active'  => false,
],[
    'label'   => '<small><span class="glyphicon glyphicon-paperclip"></span> Inventories</small>',
    'content' => $this->blocks['Inventories'],
    'active'  => false,
],[
    'label'   => '<small><span class="glyphicon glyphicon-paperclip"></span> Staff</small>',
    'content' => $this->blocks['Staff'],
    'active'  => false,
], ]
                 ]
    );
    ?></div>

