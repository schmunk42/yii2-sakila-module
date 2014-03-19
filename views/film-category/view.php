<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var schmunk42\sakila\models\FilmCategory $model
 */

$this->title = $model->film_id;
$this->params['breadcrumbs'][] = ['label' => 'Film Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="film-category-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Update', ['update', 'film_id' => $model->film_id, 'category_id' => $model->category_id], ['class' => 'btn btn-primary']) ?>
		<?php echo Html::a('Delete', ['delete', 'film_id' => $model->film_id, 'category_id' => $model->category_id], [
			'class' => 'btn btn-danger',
			'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
			'data-method' => 'post',
		]); ?>
	</p>

	<?php echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'film_id',
			'category_id',
			'last_update',
		],
	]); ?>

    <h3><?= \yii\helpers\Html::a('Category', ['category/index']) ?></h3><?php
$provider = new \yii\data\ActiveDataProvider([
    'query' => $model->getCategory(),
    'pagination' => [
        'pageSize' => 5,
    ],
]);
?>
<?php if($provider->count != 0): ?>
    <?= \yii\grid\GridView::widget(['dataProvider' => $provider,]); ?>
<?php endif; ?><h3><?= \yii\helpers\Html::a('Film', ['film/index']) ?></h3><?php
$provider = new \yii\data\ActiveDataProvider([
    'query' => $model->getFilm(),
    'pagination' => [
        'pageSize' => 5,
    ],
]);
?>
<?php if($provider->count != 0): ?>
    <?= \yii\grid\GridView::widget(['dataProvider' => $provider,]); ?>
<?php endif; ?>
</div>
