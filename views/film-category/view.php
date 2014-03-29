<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var schmunk42\sakila\models\FilmCategory $model
 */

$this->title = 'Film Category <small>View ' . $model->film_id . '</small>';
$this->params['breadcrumbs'][] = ['label' => 'Film Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="film-category-view">

	<h1><?= $this->title ?></h1>

	<p>
		<?= Html::a('Edit', ['update', 'film_id' => $model->film_id, 'category_id' => $model->category_id], ['class' => 'btn btn-primary']) ?>
		<?php echo Html::a('Delete', ['delete', 'film_id' => $model->film_id, 'category_id' => $model->category_id], [
			'class' => 'btn btn-danger',
			'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
			'data-method' => 'post',
		]); ?>
	</p>

    
    <?php $this->beginBlock('schmunk42\sakila\models\FilmCategory'); ?>
    <p class='pull-right'><?= \yii\helpers\Html::a('FilmCategory', ['filmCategory/index'], ['class'=>'btn btn-primary']) ?></p>
	<?php echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'film_id',
			'category_id',
			'last_update',
		],
	]); ?>
    <?php $this->endBlock(); ?>
    
    <?=
    \yii\bootstrap\Tabs::widget(
                 [
                     'items' => [ [
    'label'   => 'FilmCategory',
    'content' => $this->blocks['schmunk42\sakila\models\FilmCategory'],
    'active'  => true,
], ]
                 ]
    );
    ?></div>
