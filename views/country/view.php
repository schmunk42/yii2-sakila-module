<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\Country $model
*/

$this->title = 'Country View ' . $model->country_id . '';
$this->params['breadcrumbs'][] = ['label' => 'Countries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->country_id, 'url' => ['view', 'id' => $model->country_id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="country-view">

    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Edit', ['update', 'id' => $model->country_id],
        ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> New', ['create'], ['class' => 'btn
        btn-success']) ?>
    </p>

        <p class='pull-right'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> List', ['index'], ['class'=>'btn btn-default']) ?>
    </p><div class='clearfix'></div> 

    
    <?php $this->beginBlock('schmunk42\sakila\models\Country'); ?>

    <h3>
        <?= $model->country_id ?>    </h3>

    <?php echo DetailView::widget([
    'model' => $model,
    'attributes' => [
    'country_id',
'country',
'last_update',
    ],
    ]); ?>

    <hr/>

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'id' => $model->country_id],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
    'data-method' => 'post',
    ]); ?>

    <?php $this->endBlock(); ?>


    
<?php $this->beginBlock('Cities'); ?>
<p class='pull-left'>
</p>
<p class='pull-right'>
  <?= \yii\helpers\Html::a(
            'New City',
            ['city/create', 'City'=>['country_id'=>$model->country_id]],
            ['class'=>'btn btn-default btn-xs']
        ) ?>
  <?= \yii\helpers\Html::a(
            'List All Cities',
            ['city/index'],
            ['class'=>'btn btn-default btn-xs']
        ) ?>
</p><div class='clearfix'></div>
<?php Pjax::begin() ?>
<?= \yii\grid\GridView::widget([
    'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getCities(), 'pagination' => ['pageSize' => 10]]),
    'columns' => [			'city_id',
			'city',
[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "country_id",
            "value" => function($model){
                if ($rel = $model->getCountry()->one()) {
                    return yii\helpers\Html::a($rel->country_id,["country/view","id" => $rel->country_id],["data-pjax"=>0]);
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
    'controller' => 'city'
],]
]);?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


    <?=
    \yii\bootstrap\Tabs::widget(
                 [
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> Country',
    'content' => $this->blocks['schmunk42\sakila\models\Country'],
    'active'  => true,
],[
    'label'   => '<small><span class="glyphicon glyphicon-paperclip"></span> Cities</small>',
    'content' => $this->blocks['Cities'],
    'active'  => false,
], ]
                 ]
    );
    ?></div>

