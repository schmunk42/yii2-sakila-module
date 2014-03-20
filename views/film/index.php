<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var schmunk42\sakila\models\FilmSearch $searchModel
 */

$this->title = 'Films';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="film-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<div class="clearfix">
        <p class="pull-left">
            <?= Html::a('Create', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <p class="pull-right">
                                            <?= Html::a('Language', ['language/index'], ['class' => 'btn btn-primary']) ?>
                                            <?= Html::a('Language', ['language/index'], ['class' => 'btn btn-primary']) ?>
                                            <?= Html::a('Actor', ['actor/index'], ['class' => 'btn btn-primary']) ?>
                                            <?= Html::a('Category', ['category/index'], ['class' => 'btn btn-primary']) ?>
                                            <?= Html::a('Inventory', ['inventory/index'], ['class' => 'btn btn-primary']) ?>
                    </p>
    </div>

	<?php echo GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'film_id',
			'title',
			'description:ntext',
			'release_year',
			'language_id',
			// 'original_language_id',
			// 'rental_duration',
			// 'rental_rate',
			// 'length',
			// 'replacement_cost',
			// 'rating',
			// 'special_features',
			// 'last_update',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>

</div>
