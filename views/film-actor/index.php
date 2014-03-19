<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var schmunk42\sakila\models\FilmActorSearch $searchModel
 */

$this->title = 'Film Actors';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="film-actor-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create FilmActor', ['create'], ['class' => 'btn btn-success']) ?>

                    		    <?= Html::a('Go To Actor', ['actor/index'], ['class' => 'btn btn-primary']) ?>
                    		    <?= Html::a('Go To Film', ['film/index'], ['class' => 'btn btn-primary']) ?>
        	</p>

	<?php echo GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'actor_id',
			'film_id',
			'last_update',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>

</div>
