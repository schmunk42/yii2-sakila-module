<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var schmunk42\sakila\models\Film $model
 */

$this->title = 'Film <small>View ' . $model->title . '</small>';
$this->params['breadcrumbs'][] = ['label' => 'Films', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="film-view">

	<h1><?= $this->title ?></h1>

	<p>
		<?= Html::a('Edit', ['update', 'id' => $model->film_id], ['class' => 'btn btn-primary']) ?>
		<?php echo Html::a('Delete', ['delete', 'id' => $model->film_id], [
			'class' => 'btn btn-danger',
			'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
			'data-method' => 'post',
		]); ?>
	</p>

    
    <?php $this->beginBlock('schmunk42\sakila\models\Film'); ?>
    <p class='pull-right'><?= \yii\helpers\Html::a('Film', ['film/index'], ['class'=>'btn btn-primary']) ?></p>
	<?php echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'film_id',
			'title',
			'description:ntext',
			'release_year',
['format'=>'raw','attribute'=>'language_id', 'value'=> \yii\helpers\Html::a($model->language_id, ['language/view', 'id'=>$model->language_id])],['format'=>'raw','attribute'=>'original_language_id', 'value'=> \yii\helpers\Html::a($model->original_language_id, ['language/view', 'id'=>$model->original_language_id])],			'rental_duration',
			'rental_rate',
			'length',
			'replacement_cost',
			'rating',
			'special_features',
			'last_update',
		],
	]); ?>
    <?php $this->endBlock(); ?>
    <?php $this->beginBlock('Actors'); ?><?php \yii\widgets\Pjax::begin() ?><p class='pull-right'><?= \yii\helpers\Html::a('Actors', ['actor/index'], ['class'=>'btn btn-primary']) ?></p><?php
$provider = new \yii\data\ActiveDataProvider([
    'query' => $model->getActors(),
    'pagination' => [
        'pageSize' => 10,
    ],
]);
?>
<?php if($provider->count != 0): ?>
    <?= \yii\grid\GridView::widget([
            'dataProvider' => $provider,
            'columns' => array (
  0 => 'actor_id',
  1 => 'first_name',
  2 => 'last_name',
  3 => 
  array (
    'class' => 'yii\\grid\\ActionColumn',
    'controller' => 'actor',
  ),
)
        ]); ?>
<?php endif; ?><?php \yii\widgets\Pjax::end() ?><?php $this->endBlock() ?><?php $this->beginBlock('Categories'); ?><?php \yii\widgets\Pjax::begin() ?><p class='pull-right'><?= \yii\helpers\Html::a('Categories', ['category/index'], ['class'=>'btn btn-primary']) ?></p><?php
$provider = new \yii\data\ActiveDataProvider([
    'query' => $model->getCategories(),
    'pagination' => [
        'pageSize' => 10,
    ],
]);
?>
<?php if($provider->count != 0): ?>
    <?= \yii\grid\GridView::widget([
            'dataProvider' => $provider,
            'columns' => array (
  0 => 'category_id',
  1 => 'name',
  2 => 
  array (
    'class' => 'yii\\grid\\ActionColumn',
    'controller' => 'category',
  ),
)
        ]); ?>
<?php endif; ?><?php \yii\widgets\Pjax::end() ?><?php $this->endBlock() ?><?php $this->beginBlock('Inventories'); ?><?php \yii\widgets\Pjax::begin() ?><p class='pull-right'><?= \yii\helpers\Html::a('Inventories', ['inventory/index'], ['class'=>'btn btn-primary']) ?></p><?php
$provider = new \yii\data\ActiveDataProvider([
    'query' => $model->getInventories(),
    'pagination' => [
        'pageSize' => 10,
    ],
]);
?>
<?php if($provider->count != 0): ?>
    <?= \yii\grid\GridView::widget([
            'dataProvider' => $provider,
            'columns' => array (
  0 => 'inventory_id',
  1 => 'film.title',
  2 => 'store_id',
  3 => 
  array (
    'class' => 'yii\\grid\\ActionColumn',
    'controller' => 'inventory',
  ),
)
        ]); ?>
<?php endif; ?><?php \yii\widgets\Pjax::end() ?><?php $this->endBlock() ?>
    <?=
    \yii\bootstrap\Tabs::widget(
                 [
                     'items' => [ [
    'label'   => 'Film',
    'content' => $this->blocks['schmunk42\sakila\models\Film'],
    'active'  => true,
],[
    'label'   => 'Actors',
    'content' => $this->blocks['Actors'],
    'active'  => false,
],[
    'label'   => 'Categories',
    'content' => $this->blocks['Categories'],
    'active'  => false,
],[
    'label'   => 'Inventories',
    'content' => $this->blocks['Inventories'],
    'active'  => false,
], ]
                 ]
    );
    ?></div>
