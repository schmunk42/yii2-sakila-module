<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var schmunk42\sakila\models\Payment $model
 */

$this->title = 'Update Payment: ' . $model->payment_id;
$this->params['breadcrumbs'][] = ['label' => 'Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->payment_id, 'url' => ['view', 'id' => $model->payment_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="payment-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>