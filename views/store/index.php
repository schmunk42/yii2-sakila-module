<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var schmunk42\sakila\models\StoreSearch $searchModel
 */

$this->title = 'Stores';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="store-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create Store', ['create'], ['class' => 'btn btn-success']) ?>

                    		    <?= Html::a('Go To Customer', ['customer/index'], ['class' => 'btn btn-primary']) ?>
                    		    <?= Html::a('Go To Inventory', ['inventory/index'], ['class' => 'btn btn-primary']) ?>
                    		    <?= Html::a('Go To Staff', ['staff/index'], ['class' => 'btn btn-primary']) ?>
                    		    <?= Html::a('Go To Address', ['address/index'], ['class' => 'btn btn-primary']) ?>
                    		    <?= Html::a('Go To Staff', ['staff/index'], ['class' => 'btn btn-primary']) ?>
        	</p>

	<?php echo GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'store_id',
			'manager_staff_id',
			'address_id',
			'last_update',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>

</div>
