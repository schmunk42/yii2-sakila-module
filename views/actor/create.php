<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var schmunk42\sakila\models\Actor $model
 */

$this->title = 'Create Actor';
$this->params['breadcrumbs'][] = ['label' => 'Actors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actor-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
