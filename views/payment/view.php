<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var schmunk42\sakila\models\Payment $model
 */

$this->title = 'Payment <small>View ' . $model->payment_id . '</small>';
$this->params['breadcrumbs'][] = ['label' => 'Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-view">

	<h1><?= $this->title ?></h1>

	<p>
		<?= Html::a('Edit', ['update', 'id' => $model->payment_id], ['class' => 'btn btn-primary']) ?>
		<?php echo Html::a('Delete', ['delete', 'id' => $model->payment_id], [
			'class' => 'btn btn-danger',
			'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
			'data-method' => 'post',
		]); ?>
	</p>

    
    <?php $this->beginBlock('schmunk42\sakila\models\Payment'); ?>
    <p class='pull-right'><?= \yii\helpers\Html::a('Payment', ['payment/index'], ['class'=>'btn btn-primary']) ?></p>
	<?php echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'payment_id',
['format'=>'raw','attribute'=>'customer_id', 'value'=> \yii\helpers\Html::a($model->customer_id, ['customer/view', 'id'=>$model->customer_id])],['format'=>'raw','attribute'=>'staff_id', 'value'=> \yii\helpers\Html::a($model->staff_id, ['staff/view', 'id'=>$model->staff_id])],['format'=>'raw','attribute'=>'rental_id', 'value'=> \yii\helpers\Html::a($model->rental_id, ['rental/view', 'id'=>$model->rental_id])],			'amount',
			'payment_date',
			'last_update',
		],
	]); ?>
    <?php $this->endBlock(); ?>
    
    <?=
    \yii\bootstrap\Tabs::widget(
                 [
                     'items' => [ [
    'label'   => 'Payment',
    'content' => $this->blocks['schmunk42\sakila\models\Payment'],
    'active'  => true,
], ]
                 ]
    );
    ?></div>
