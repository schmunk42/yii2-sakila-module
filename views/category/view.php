<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var schmunk42\sakila\models\Category $model
 */

$this->title = 'Category <small>View ' . $model->name . '</small>';
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

	<h1><?= $this->title ?></h1>

	<p>
		<?= Html::a('Edit', ['update', 'id' => $model->category_id], ['class' => 'btn btn-primary']) ?>
		<?php echo Html::a('Delete', ['delete', 'id' => $model->category_id], [
			'class' => 'btn btn-danger',
			'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
			'data-method' => 'post',
		]); ?>
	</p>

    
    <?php $this->beginBlock('schmunk42\sakila\models\Category'); ?>
    <p class='pull-right'><?= \yii\helpers\Html::a('Category', ['category/index'], ['class'=>'btn btn-primary']) ?></p>
	<?php echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'category_id',
			'name',
			'last_update',
		],
	]); ?>
    <?php $this->endBlock(); ?>
    <?php $this->beginBlock('Films'); ?><?php \yii\widgets\Pjax::begin() ?><p class='pull-right'><?= \yii\helpers\Html::a('Films', ['film/index'], ['class'=>'btn btn-primary']) ?></p><?php
$provider = new \yii\data\ActiveDataProvider([
    'query' => $model->getFilms(),
    'pagination' => [
        'pageSize' => 10,
    ],
]);
?>
<?php if($provider->count != 0): ?>
    <?= \yii\grid\GridView::widget([
            'dataProvider' => $provider,
            'columns' => array (
  0 => 'film_id',
  1 => 'title',
  2 => 'description',
  3 => 'release_year',
  4 => 'language_id',
  5 => 'original_language_id',
  6 => 
  array (
    'class' => 'yii\\grid\\ActionColumn',
    'controller' => 'film',
  ),
)
        ]); ?>
<?php endif; ?><?php \yii\widgets\Pjax::end() ?><?php $this->endBlock() ?>
    <?=
    \yii\bootstrap\Tabs::widget(
                 [
                     'items' => [ [
    'label'   => 'Category',
    'content' => $this->blocks['schmunk42\sakila\models\Category'],
    'active'  => true,
],[
    'label'   => 'Films',
    'content' => $this->blocks['Films'],
    'active'  => false,
], ]
                 ]
    );
    ?></div>
