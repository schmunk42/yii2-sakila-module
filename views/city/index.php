<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var schmunk42\sakila\models\CitySearch $searchModel
*/

$this->title = 'Cities';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="city-index">

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
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Address</i>',
        'url' => [
            'address/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-left"> Country</i>',
        'url' => [
            'country/index',
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
        
			'city_id',
			'city',
			[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "country_id",
            "value" => function($model){
                if ($rel = $model->getCountry()->one()) {
                    return yii\helpers\Html::a($rel->country_id,["country/view","id" => $rel->country_id],["data-pjax"=>0]);
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
