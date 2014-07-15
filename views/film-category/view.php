<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\FilmCategory $model
*/

$this->title = 'Film Category View ' . $model->film_id . '';
$this->params['breadcrumbs'][] = ['label' => 'Film Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->film_id, 'url' => ['view', 'film_id' => $model->film_id, 'category_id' => $model->category_id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="film-category-view">

    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Edit', ['update', 'film_id' => $model->film_id, 'category_id' => $model->category_id],
        ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> New', ['create'], ['class' => 'btn
        btn-success']) ?>
    </p>

        <p class='pull-right'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> List', ['index'], ['class'=>'btn btn-default']) ?>
    </p><div class='clearfix'></div> 

    
    <?php $this->beginBlock('schmunk42\sakila\models\FilmCategory'); ?>

    <h3>
        <?= $model->film_id ?>    </h3>

    <?php echo DetailView::widget([
    'model' => $model,
    'attributes' => [
    [
    'format'=>'html',
    'attribute'=>'film_id',
    'value' => Html::a($model->getFilm()->one()?$model->getFilm()->one()->title:'', ['film/view', 'id' => $model->film_id]),
],
[
    'format'=>'html',
    'attribute'=>'category_id',
    'value' => Html::a($model->getCategory()->one()?$model->getCategory()->one()->name:'', ['category/view', 'id' => $model->category_id]),
],
'last_update',
    ],
    ]); ?>

    <hr/>

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'film_id' => $model->film_id, 'category_id' => $model->category_id],
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
    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> FilmCategory',
    'content' => $this->blocks['schmunk42\sakila\models\FilmCategory'],
    'active'  => true,
], ]
                 ]
    );
    ?></div>

