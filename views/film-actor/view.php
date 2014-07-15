<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\FilmActor $model
*/

$this->title = 'Film Actor View ' . $model->actor_id . '';
$this->params['breadcrumbs'][] = ['label' => 'Film Actors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->actor_id, 'url' => ['view', 'actor_id' => $model->actor_id, 'film_id' => $model->film_id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="film-actor-view">

    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Edit', ['update', 'actor_id' => $model->actor_id, 'film_id' => $model->film_id],
        ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> New', ['create'], ['class' => 'btn
        btn-success']) ?>
    </p>

        <p class='pull-right'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> List', ['index'], ['class'=>'btn btn-default']) ?>
    </p><div class='clearfix'></div> 

    
    <?php $this->beginBlock('schmunk42\sakila\models\FilmActor'); ?>

    <h3>
        <?= $model->actor_id ?>    </h3>

    <?php echo DetailView::widget([
    'model' => $model,
    'attributes' => [
    [
    'format'=>'html',
    'attribute'=>'actor_id',
    'value' => Html::a($model->getActor()->one()?$model->getActor()->one()->label:'', ['actor/view', 'id' => $model->actor_id]),
],
[
    'format'=>'html',
    'attribute'=>'film_id',
    'value' => Html::a($model->getFilm()->one()?$model->getFilm()->one()->title:'', ['film/view', 'id' => $model->film_id]),
],
'last_update',
    ],
    ]); ?>

    <hr/>

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'actor_id' => $model->actor_id, 'film_id' => $model->film_id],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
    'data-method' => 'post',
    ]); ?>

    <?php $this->endBlock(); ?>


    
    <?=
    \yii\bootstrap\Tabs::widget(
                 [
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> FilmActor',
    'content' => $this->blocks['schmunk42\sakila\models\FilmActor'],
    'active'  => true,
], ]
                 ]
    );
    ?></div>

