<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var schmunk42\sakila\models\FilmCategorySearch $searchModel
*/

$this->title = 'Film Categories';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="film-category-index">

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
        'label' => '<i class="glyphicon glyphicon-arrow-left"> Category</i>',
        'url' => [
            'category/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-left"> Film</i>',
        'url' => [
            'film/index',
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
        
			[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "film_id",
            "value" => function($model){
                if ($rel = $model->getFilm()->one()) {
                    return yii\helpers\Html::a($rel->title,["film/view","id" => $rel->film_id],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
],
			[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "category_id",
            "value" => function($model){
                if ($rel = $model->getCategory()->one()) {
                    return yii\helpers\Html::a($rel->name,["category/view","id" => $rel->category_id],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
</div>
