<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var schmunk42\sakila\models\FilmSearch $searchModel
*/

$this->title = 'Films';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="film-index">

    <?php //     echo $this->render('_search', ['model' =>$searchModel]);
    ?>

    <div class="clearfix">
        <p class="pull-left">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> New', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <div class="pull-right">


                                                                                                                                                                                                                            
            <?php             echo \yii\bootstrap\ButtonDropdown::widget(
                [
                    'id'       => 'giiant-relations',
                    'encodeLabel' => false,
                    'label'    => '<span class="glyphicon glyphicon-paperclip"></span> Relations',
                    'dropdown' => [
                        'options'      => [
                            'class' => 'dropdown-menu-right'
                        ],
                        'encodeLabels' => false,
                        'items'        => [
    [
        'label' => '<i class="glyphicon glyphicon-arrow-left"> Language</i>',
        'url' => [
            'language/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-left"> Language</i>',
        'url' => [
            'language/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-random"> Film Actor</i>',
        'url' => [
            'film-actor/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Actor</i>',
        'url' => [
            'actor/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-random"> Film Category</i>',
        'url' => [
            'film-category/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Category</i>',
        'url' => [
            'category/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Inventory</i>',
        'url' => [
            'inventory/index',
        ],
    ],
]                    ],
                ]
            );
            ?>        </div>
    </div>

            <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
        
			'film_id',
			'title',
			'description:ntext',
			'release_year',
			[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "language_id",
            "value" => function($model){
                if ($rel = $model->getLanguage()->one()) {
                    return yii\helpers\Html::a($rel->name,["language/view","id" => $rel->language_id],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
],
			[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "original_language_id",
            "value" => function($model){
                if ($rel = $model->getOriginalLanguage()->one()) {
                    return yii\helpers\Html::a($rel->name,["language/view","id" => $rel->language_id],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
],
			'rental_duration',
			/*'rental_rate'*/
			/*'length'*/
			/*'replacement_cost'*/
			/*'rating'*/
			/*'special_features'*/
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
</div>
