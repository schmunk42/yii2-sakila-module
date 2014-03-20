<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var schmunk42\sakila\models\StaffSearch $searchModel
 */

$this->title = 'Staff';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="staff-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<div class="clearfix">
        <p class="pull-left">
            <?= Html::a('Create', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <p class="pull-right">
                                            <?= Html::a('Payment', ['payment/index'], ['class' => 'btn btn-primary']) ?>
                                            <?= Html::a('Rental', ['rental/index'], ['class' => 'btn btn-primary']) ?>
                                            <?= Html::a('Address', ['address/index'], ['class' => 'btn btn-primary']) ?>
                                            <?= Html::a('Store', ['store/index'], ['class' => 'btn btn-primary']) ?>
                                            <?= Html::a('Store', ['store/index'], ['class' => 'btn btn-primary']) ?>
                    </p>
    </div>

	<?php echo GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'staff_id',
			'first_name',
			'last_name',
			'address_id',
			'picture',
			// 'email:email',
			// 'store_id',
			// 'active',
			// 'username',
			// 'password',
			// 'last_update',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>

</div>
