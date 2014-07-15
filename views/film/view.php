<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\Film $model
*/

$this->title = 'Film View ' . $model->title . '';
$this->params['breadcrumbs'][] = ['label' => 'Films', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->film_id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="film-view">

    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Edit', ['update', 'id' => $model->film_id],
        ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> New', ['create'], ['class' => 'btn
        btn-success']) ?>
    </p>

        <p class='pull-right'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> List', ['index'], ['class'=>'btn btn-default']) ?>
    </p><div class='clearfix'></div> 

    
    <?php $this->beginBlock('schmunk42\sakila\models\Film'); ?>

    <h3>
        <?= $model->title ?>    </h3>

    <?php echo DetailView::widget([
    'model' => $model,
    'attributes' => [
    'film_id',
'title',
'description:ntext',
'release_year',
[
    'format'=>'html',
    'attribute'=>'language_id',
    'value' => Html::a($model->getLanguage()->one()?$model->getLanguage()->one()->name:'', ['language/view', 'id' => $model->language_id]),
],
[
    'format'=>'html',
    'attribute'=>'original_language_id',
    'value' => Html::a($model->getOriginalLanguage()->one()?$model->getOriginalLanguage()->one()->name:'', ['language/view', 'id' => $model->original_language_id]),
],
'rental_duration',
'rental_rate',
'length',
'replacement_cost',
'rating',
'special_features',
'last_update',
    ],
    ]); ?>

    <hr/>

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'id' => $model->film_id],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
    'data-method' => 'post',
    ]); ?>

    <?php $this->endBlock(); ?>


    
<?php $this->beginBlock('Actors'); ?>
<p class='pull-left'>
  <?= \yii\helpers\Html::a(
            '<span class="glyphicon glyphicon-link"></span> Attach Actor', ['film-actor/create', 'FilmActor'=>['film_id'=>$model->film_id]],
            ['class'=>'btn btn-primary btn-xs']
        ) ?>
</p>
<p class='pull-right'>
  <?= \yii\helpers\Html::a(
            'New Actor',
            ['actor/create', 'Actor'=>['actor_id'=>$model->film_id]],
            ['class'=>'btn btn-default btn-xs']
        ) ?>
  <?= \yii\helpers\Html::a(
            'List All Actors',
            ['actor/index'],
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


<?php $this->beginBlock('Categories'); ?>
<p class='pull-left'>
  <?= \yii\helpers\Html::a(
            '<span class="glyphicon glyphicon-link"></span> Attach Category', ['film-category/create', 'FilmCategory'=>['film_id'=>$model->film_id]],
            ['class'=>'btn btn-primary btn-xs']
        ) ?>
</p>
<p class='pull-right'>
  <?= \yii\helpers\Html::a(
            'New Category',
            ['category/create', 'Category'=>['category_id'=>$model->film_id]],
            ['class'=>'btn btn-default btn-xs']
        ) ?>
  <?= \yii\helpers\Html::a(
            'List All Categories',
            ['category/index'],
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


<?php $this->beginBlock('Inventories'); ?>
<p class='pull-left'>
</p>
<p class='pull-right'>
  <?= \yii\helpers\Html::a(
            'New Inventory',
            ['inventory/create', 'Inventory'=>['film_id'=>$model->film_id]],
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


    <?=
    \yii\bootstrap\Tabs::widget(
                 [
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> Film',
    'content' => $this->blocks['schmunk42\sakila\models\Film'],
    'active'  => true,
],[
    'label'   => '<small><span class="glyphicon glyphicon-paperclip"></span> Actors</small>',
    'content' => $this->blocks['Actors'],
    'active'  => false,
],[
    'label'   => '<small><span class="glyphicon glyphicon-paperclip"></span> Categories</small>',
    'content' => $this->blocks['Categories'],
    'active'  => false,
],[
    'label'   => '<small><span class="glyphicon glyphicon-paperclip"></span> Inventories</small>',
    'content' => $this->blocks['Inventories'],
    'active'  => false,
], ]
                 ]
    );
    ?></div>

