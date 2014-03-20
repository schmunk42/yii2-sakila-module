<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var schmunk42\sakila\models\ActorSearch $searchModel
 */

$this->title = 'Actors';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="actor-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<div class="clearfix">
        <p class="pull-left">
            <?= Html::a('Create', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <p class="pull-right">
                                            <?= Html::a('Film', ['film/index'], ['class' => 'btn btn-primary']) ?>
                    </p>
    </div>

	<?php echo GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'actor_id',
			'first_name',
			'last_name',
			'last_update',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>

</div>
