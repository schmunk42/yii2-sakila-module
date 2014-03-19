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

	<p>
		<?= Html::a('Create Staff', ['create'], ['class' => 'btn btn-success']) ?>

                    		    <?= Html::a('Go To Payment', ['payment/index'], ['class' => 'btn btn-primary']) ?>
                    		    <?= Html::a('Go To Rental', ['rental/index'], ['class' => 'btn btn-primary']) ?>
                    		    <?= Html::a('Go To Address', ['address/index'], ['class' => 'btn btn-primary']) ?>
                    		    <?= Html::a('Go To Store', ['store/index'], ['class' => 'btn btn-primary']) ?>
                    		    <?= Html::a('Go To Store', ['store/index'], ['class' => 'btn btn-primary']) ?>
        	</p>

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
