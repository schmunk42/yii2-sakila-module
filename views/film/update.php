<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var schmunk42\sakila\models\Film $model
 */

$this->title = 'Update Film: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Films', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->film_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="film-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
