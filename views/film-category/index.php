<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var schmunk42\sakila\models\FilmCategorySearch $searchModel
 */

$this->title = 'Film Categories';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="film-category-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<div class="clearfix">
        <p class="pull-left">
            <?= Html::a('Create', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <p class="pull-right">
                                            <?= Html::a('Category', ['category/index'], ['class' => 'btn btn-primary']) ?>
                                            <?= Html::a('Film', ['film/index'], ['class' => 'btn btn-primary']) ?>
                    </p>
    </div>

	<?php echo GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'film_id',
			'category_id',
			'last_update',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>

</div>