<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var schmunk42\sakila\models\FilmActor $model
 */

$this->title = 'Film Actor <small>View ' . $model->actor_id . '</small>';
$this->params['breadcrumbs'][] = ['label' => 'Film Actors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="film-actor-view">

	<h1><?= $this->title ?></h1>

	<p>
		<?= Html::a('Edit', ['update', 'actor_id' => $model->actor_id, 'film_id' => $model->film_id], ['class' => 'btn btn-primary']) ?>
		<?php echo Html::a('Delete', ['delete', 'actor_id' => $model->actor_id, 'film_id' => $model->film_id], [
			'class' => 'btn btn-danger',
			'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
			'data-method' => 'post',
		]); ?>
	</p>

    
    <?php $this->beginBlock('schmunk42\sakila\models\FilmActor'); ?>
    <p class='pull-right'><?= \yii\helpers\Html::a('FilmActor', ['filmActor/index'], ['class'=>'btn btn-primary']) ?></p>
	<?php echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'actor_id',
			'film_id',
			'last_update',
		],
	]); ?>
    <?php $this->endBlock(); ?>
    
    <?=
    \yii\bootstrap\Tabs::widget(
                 [
                     'items' => [ [
    'label'   => 'FilmActor',
    'content' => $this->blocks['schmunk42\sakila\models\FilmActor'],
    'active'  => true,
], ]
                 ]
    );
    ?></div>
