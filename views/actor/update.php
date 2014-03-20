<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var schmunk42\sakila\models\Actor $model
 */

$this->title = 'Actor <small>Update ' . $model->actor_id . '</small>';
$this->params['breadcrumbs'][] = ['label' => 'Actors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->actor_id, 'url' => ['view', 'id' => $model->actor_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="actor-update">

	<h1><?= $this->title ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
