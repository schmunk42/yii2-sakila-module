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

	<div class="clearfix">
        <p class="pull-left">
            <?= Html::a('Create', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <p class="pull-right">
                                            <?= Html::a('Customer', ['customer/index'], ['class' => 'btn btn-primary']) ?>
                                            <?= Html::a('Rental', ['rental/index'], ['class' => 'btn btn-primary']) ?>
                                            <?= Html::a('Staff', ['staff/index'], ['class' => 'btn btn-primary']) ?>
                    </p>
    </div>

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
