<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var schmunk42\sakila\models\Language $model
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Languages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="language-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Update', ['update', 'id' => $model->language_id], ['class' => 'btn btn-primary']) ?>
		<?php echo Html::a('Delete', ['delete', 'id' => $model->language_id], [
			'class' => 'btn btn-danger',
			'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
			'data-method' => 'post',
		]); ?>
	</p>

	<?php echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'language_id',
			'name',
			'last_update',
		],
	]); ?>

    <h3><?= \yii\helpers\Html::a('Films', ['film/index']) ?></h3><?php
$provider = new \yii\data\ActiveDataProvider([
    'query' => $model->getFilms(),
    'pagination' => [
        'pageSize' => 5,
    ],
]);
?>
<?php if($provider->count != 0): ?>
    <?= \yii\grid\GridView::widget(['dataProvider' => $provider,]); ?>
<?php endif; ?>
</div>
