<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var schmunk42\sakila\models\Film $model
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Films', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="film-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Update', ['update', 'id' => $model->film_id], ['class' => 'btn btn-primary']) ?>
		<?php echo Html::a('Delete', ['delete', 'id' => $model->film_id], [
			'class' => 'btn btn-danger',
			'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
			'data-method' => 'post',
		]); ?>
	</p>

	<?php echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'film_id',
			'title',
			'description:ntext',
			'release_year',
			'language_id',
			'original_language_id',
			'rental_duration',
			'rental_rate',
			'length',
			'replacement_cost',
			'rating',
			'special_features',
			'last_update',
		],
	]); ?>

    <h3><?= \yii\helpers\Html::a('Language', ['language/index']) ?></h3><?php
$provider = new \yii\data\ActiveDataProvider([
    'query' => $model->getLanguage(),
    'pagination' => [
        'pageSize' => 5,
    ],
]);
?>
<?php if($provider->count != 0): ?>
    <?= \yii\grid\GridView::widget(['dataProvider' => $provider,]); ?>
<?php endif; ?><h3><?= \yii\helpers\Html::a('OriginalLanguage', ['language/index']) ?></h3><?php
$provider = new \yii\data\ActiveDataProvider([
    'query' => $model->getOriginalLanguage(),
    'pagination' => [
        'pageSize' => 5,
    ],
]);
?>
<?php if($provider->count != 0): ?>
    <?= \yii\grid\GridView::widget(['dataProvider' => $provider,]); ?>
<?php endif; ?><h3><?= \yii\helpers\Html::a('FilmActor', ['filmActor/index']) ?></h3><?php
$provider = new \yii\data\ActiveDataProvider([
    'query' => $model->getFilmActor(),
    'pagination' => [
        'pageSize' => 5,
    ],
]);
?>
<?php if($provider->count != 0): ?>
    <?= \yii\grid\GridView::widget(['dataProvider' => $provider,]); ?>
<?php endif; ?><h3><?= \yii\helpers\Html::a('Actors', ['actor/index']) ?></h3><?php
$provider = new \yii\data\ActiveDataProvider([
    'query' => $model->getActors(),
    'pagination' => [
        'pageSize' => 5,
    ],
]);
?>
<?php if($provider->count != 0): ?>
    <?= \yii\grid\GridView::widget(['dataProvider' => $provider,]); ?>
<?php endif; ?><h3><?= \yii\helpers\Html::a('FilmCategory', ['filmCategory/index']) ?></h3><?php
$provider = new \yii\data\ActiveDataProvider([
    'query' => $model->getFilmCategory(),
    'pagination' => [
        'pageSize' => 5,
    ],
]);
?>
<?php if($provider->count != 0): ?>
    <?= \yii\grid\GridView::widget(['dataProvider' => $provider,]); ?>
<?php endif; ?><h3><?= \yii\helpers\Html::a('Categories', ['category/index']) ?></h3><?php
$provider = new \yii\data\ActiveDataProvider([
    'query' => $model->getCategories(),
    'pagination' => [
        'pageSize' => 5,
    ],
]);
?>
<?php if($provider->count != 0): ?>
    <?= \yii\grid\GridView::widget(['dataProvider' => $provider,]); ?>
<?php endif; ?><h3><?= \yii\helpers\Html::a('Inventories', ['inventory/index']) ?></h3><?php
$provider = new \yii\data\ActiveDataProvider([
    'query' => $model->getInventories(),
    'pagination' => [
        'pageSize' => 5,
    ],
]);
?>
<?php if($provider->count != 0): ?>
    <?= \yii\grid\GridView::widget(['dataProvider' => $provider,]); ?>
<?php endif; ?>
</div>
