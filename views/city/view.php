<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\City $model
*/

$this->title = 'City View ' . $model->city_id . '';
$this->params['breadcrumbs'][] = ['label' => 'Cities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->city_id, 'url' => ['view', 'id' => $model->city_id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="city-view">

    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Edit', ['update', 'id' => $model->city_id],
        ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> New', ['create'], ['class' => 'btn
        btn-success']) ?>
    </p>

        <p class='pull-right'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> List', ['index'], ['class'=>'btn btn-default']) ?>
    </p><div class='clearfix'></div> 

    
    <?php $this->beginBlock('schmunk42\sakila\models\City'); ?>

    <h3>
        <?= $model->city_id ?>    </h3>

    <?php echo DetailView::widget([
    'model' => $model,
    'attributes' => [
    'city_id',
'city',
[
    'format'=>'html',
    'attribute'=>'country_id',
    'value' => Html::a($model->getCountry()->one()?$model->getCountry()->one()->country_id:'', ['country/view', 'id' => $model->country_id]),
],
'last_update',
    ],
    ]); ?>

    <hr/>

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'id' => $model->city_id],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
    'data-method' => 'post',
    ]); ?>

    <?php $this->endBlock(); ?>


    
<?php $this->beginBlock('Addresses'); ?>
<p class='pull-left'>
</p>
<p class='pull-right'>
  <?= \yii\helpers\Html::a(
            'New Address',
            ['address/create', 'Address'=>['city_id'=>$model->city_id]],
            ['class'=>'btn btn-default btn-xs']
        ) ?>
  <?= \yii\helpers\Html::a(
            'List All Addresses',
            ['address/index'],
            ['class'=>'btn btn-default btn-xs']
        ) ?>
</p><div class='clearfix'></div>
<?php Pjax::begin() ?>
<?= \yii\grid\GridView::widget([
    'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getAddresses(), 'pagination' => ['pageSize' => 10]]),
    'columns' => [			'address_id',
			'address',
			'address2',
			'district',
[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "city_id",
            "value" => function($model){
                if ($rel = $model->getCity()->one()) {
                    return yii\helpers\Html::a($rel->city_id,["city/view","id" => $rel->city_id],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
],
			'postal_code',
			'phone',
[
    'class'      => 'yii\grid\ActionColumn',
    'template'   => '{view} {update}',
    'buttons'    => [
        
    ],
    'controller' => 'address'
],]
]);?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


    <?=
    \yii\bootstrap\Tabs::widget(
                 [
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> City',
    'content' => $this->blocks['schmunk42\sakila\models\City'],
    'active'  => true,
],[
    'label'   => '<small><span class="glyphicon glyphicon-paperclip"></span> Addresses</small>',
    'content' => $this->blocks['Addresses'],
    'active'  => false,
], ]
                 ]
    );
    ?></div>

