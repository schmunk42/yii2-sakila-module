<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var schmunk42\sakila\models\PaymentSearch $searchModel
 */

$this->title = 'Payments';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="payment-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create Payment', ['create'], ['class' => 'btn btn-success']) ?>

                    		    <?= Html::a('Go To Customer', ['customer/index'], ['class' => 'btn btn-primary']) ?>
                    		    <?= Html::a('Go To Rental', ['rental/index'], ['class' => 'btn btn-primary']) ?>
                    		    <?= Html::a('Go To Staff', ['staff/index'], ['class' => 'btn btn-primary']) ?>
        	</p>

	<?php echo GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'payment_id',
			'customer_id',
			'staff_id',
			'rental_id',
			'amount',
			// 'payment_date',
			// 'last_update',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>

</div>
