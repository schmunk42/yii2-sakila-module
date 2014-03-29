<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var schmunk42\sakila\models\FilmActor $model
 */

$this->title = 'Film Actor <small>Update ' . $model->actor_id . '</small>';
$this->params['breadcrumbs'][] = ['label' => 'Film Actors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->actor_id, 'url' => ['view', 'actor_id' => $model->actor_id, 'film_id' => $model->film_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="film-actor-update">

	<h1><?= $this->title ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
