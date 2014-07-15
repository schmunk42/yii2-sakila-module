<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\Actor $model
*/

$this->title = 'Actor View ' . $model->actor_id . '';
$this->params['breadcrumbs'][] = ['label' => 'Actors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->actor_id, 'url' => ['view', 'id' => $model->actor_id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="actor-view">

    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Edit', ['update', 'id' => $model->actor_id],
        ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> New', ['create'], ['class' => 'btn
        btn-success']) ?>
    </p>

        <p class='pull-right'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> List', ['index'], ['class'=>'btn btn-default']) ?>
    </p><div class='clearfix'></div> 

    
    <?php $this->beginBlock('schmunk42\sakila\models\Actor'); ?>

    <h3>
        <?= $model->label ?>    </h3>

    <?php echo DetailView::widget([
    'model' => $model,
    'attributes' => [
    'actor_id',
'first_name',
'last_name',
'last_update',
    ],
    ]); ?>

    <hr/>

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'id' => $model->actor_id],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
    'data-method' => 'post',
    ]); ?>

    <?php $this->endBlock(); ?>


    
<?php $this->beginBlock('Films'); ?>
<p class='pull-left'>
  <?= \yii\helpers\Html::a(
            '<span class="glyphicon glyphicon-link"></span> Attach Film', ['film-actor/create', 'FilmActor'=>['actor_id'=>$model->actor_id]],
            ['class'=>'btn btn-primary btn-xs']
        ) ?>
</p>
<p class='pull-right'>
  <?= \yii\helpers\Html::a(
            'New Film',
            ['film/create', 'Film'=>['film_id'=>$model->actor_id]],
            ['class'=>'btn btn-default btn-xs']
        ) ?>
  <?= \yii\helpers\Html::a(
            'List All Films',
            ['film/index'],
            ['class'=>'btn btn-default btn-xs']
        ) ?>
</p><div class='clearfix'></div>
<?php Pjax::begin() ?>
<?=\yii\grid\GridView::widget([
    'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getFilmActors(), 'pagination' => ['pageSize' => 10]]),
    'columns' => [[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "actor_id",
            "value" => function($model){
                if ($rel = $model->getActor()->one()) {
                    return yii\helpers\Html::a($rel->label,["actor/view","id" => $rel->actor_id],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
],
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
    'class'      => 'yii\grid\ActionColumn',
    'template'   => '{view} {delete}',
    'buttons'    => [
        'delete' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
                    'class' => 'text-danger',
                    'title' => Yii::t('yii', 'Remove'),
                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete the related item?'),
                    'data-method' => 'post',
                    'data-pjax' => '0',
                ]);
            },
    ],
    'controller' => 'film-actor'
],]
]);?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


    <?=
    \yii\bootstrap\Tabs::widget(
                 [
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> Actor',
    'content' => $this->blocks['schmunk42\sakila\models\Actor'],
    'active'  => true,
],[
    'label'   => '<small><span class="glyphicon glyphicon-paperclip"></span> Films</small>',
    'content' => $this->blocks['Films'],
    'active'  => false,
], ]
                 ]
    );
    ?></div>

