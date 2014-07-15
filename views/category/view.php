<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\Category $model
*/

$this->title = 'Category View ' . $model->name . '';
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->category_id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="category-view">

    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Edit', ['update', 'id' => $model->category_id],
        ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> New', ['create'], ['class' => 'btn
        btn-success']) ?>
    </p>

        <p class='pull-right'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> List', ['index'], ['class'=>'btn btn-default']) ?>
    </p><div class='clearfix'></div> 

    
    <?php $this->beginBlock('schmunk42\sakila\models\Category'); ?>

    <h3>
        <?= $model->name ?>    </h3>

    <?php echo DetailView::widget([
    'model' => $model,
    'attributes' => [
    'category_id',
'name',
'last_update',
    ],
    ]); ?>

    <hr/>

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'id' => $model->category_id],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
    'data-method' => 'post',
    ]); ?>

    <?php $this->endBlock(); ?>


    
<?php $this->beginBlock('Films'); ?>
<p class='pull-left'>
  <?= \yii\helpers\Html::a(
            '<span class="glyphicon glyphicon-link"></span> Attach Film', ['film-category/create', 'FilmCategory'=>['category_id'=>$model->category_id]],
            ['class'=>'btn btn-primary btn-xs']
        ) ?>
</p>
<p class='pull-right'>
  <?= \yii\helpers\Html::a(
            'New Film',
            ['film/create', 'Film'=>['film_id'=>$model->category_id]],
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
    'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getFilmCategories(), 'pagination' => ['pageSize' => 10]]),
    'columns' => [[
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
            "attribute" => "category_id",
            "value" => function($model){
                if ($rel = $model->getCategory()->one()) {
                    return yii\helpers\Html::a($rel->name,["category/view","id" => $rel->category_id],["data-pjax"=>0]);
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
    'controller' => 'film-category'
],]
]);?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


    <?=
    \yii\bootstrap\Tabs::widget(
                 [
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> Category',
    'content' => $this->blocks['schmunk42\sakila\models\Category'],
    'active'  => true,
],[
    'label'   => '<small><span class="glyphicon glyphicon-paperclip"></span> Films</small>',
    'content' => $this->blocks['Films'],
    'active'  => false,
], ]
                 ]
    );
    ?></div>

