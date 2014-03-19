<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var schmunk42\sakila\models\AddressSearch $searchModel
 */

$this->title = 'Addresses';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="address-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create Address', ['create'], ['class' => 'btn btn-success']) ?>

                    		    <?= Html::a('Go To City', ['city/index'], ['class' => 'btn btn-primary']) ?>
                    		    <?= Html::a('Go To Customer', ['customer/index'], ['class' => 'btn btn-primary']) ?>
                    		    <?= Html::a('Go To Staff', ['staff/index'], ['class' => 'btn btn-primary']) ?>
                    		    <?= Html::a('Go To Store', ['store/index'], ['class' => 'btn btn-primary']) ?>
        	</p>

	<?php echo GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'address_id',
			'address',
			'address2',
			'district',
			'city_id',
			// 'postal_code',
			// 'phone',
			// 'last_update',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>

</div>
