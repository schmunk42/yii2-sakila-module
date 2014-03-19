<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var schmunk42\sakila\models\Inventory $model
 */

$this->title = 'Update Inventory: ' . $model->inventory_id;
$this->params['breadcrumbs'][] = ['label' => 'Inventories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->inventory_id, 'url' => ['view', 'id' => $model->inventory_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inventory-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
