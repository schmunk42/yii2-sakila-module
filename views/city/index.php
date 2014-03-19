<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var schmunk42\sakila\models\CitySearch $searchModel
 */

$this->title = 'Cities';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="city-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create City', ['create'], ['class' => 'btn btn-success']) ?>

                    		    <?= Html::a('Go To Address', ['address/index'], ['class' => 'btn btn-primary']) ?>
                    		    <?= Html::a('Go To Country', ['country/index'], ['class' => 'btn btn-primary']) ?>
        	</p>

	<?php echo GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'city_id',
			'city',
			'country_id',
			'last_update',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>

</div>
