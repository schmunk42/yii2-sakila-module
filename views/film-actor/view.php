<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var schmunk42\sakila\models\FilmActor $model
 */

$this->title = $model->actor_id;
$this->params['breadcrumbs'][] = ['label' => 'Film Actors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="film-actor-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Update', ['update', 'actor_id' => $model->actor_id, 'film_id' => $model->film_id], ['class' => 'btn btn-primary']) ?>
		<?php echo Html::a('Delete', ['delete', 'actor_id' => $model->actor_id, 'film_id' => $model->film_id], [
			'class' => 'btn btn-danger',
			'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
			'data-method' => 'post',
		]); ?>
	</p>

	<?php echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'actor_id',
			'film_id',
			'last_update',
		],
	]); ?>

    <h3><?= \yii\helpers\Html::a('Actor', ['actor/index']) ?></h3><?php
$provider = new \yii\data\ActiveDataProvider([
    'query' => $model->getActor(),
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
