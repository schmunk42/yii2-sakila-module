<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var schmunk42\sakila\models\City $model
 */

$this->title = 'City <small>Update ' . $model->city_id . '</small>';
$this->params['breadcrumbs'][] = ['label' => 'Cities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->city_id, 'url' => ['view', 'id' => $model->city_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="city-update">

	<h1><?= $this->title ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
