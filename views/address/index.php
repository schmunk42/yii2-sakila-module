<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var schmunk42\sakila\models\AddressSearch $searchModel
*/

$this->title = 'Addresses';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="address-index">

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
        'label' => '<i class="glyphicon glyphicon-arrow-left"> City</i>',
        'url' => [
            'city/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Customer</i>',
        'url' => [
            'customer/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Staff</i>',
        'url' => [
            'staff/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Store</i>',
        'url' => [
            'store/index',
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
        
			'address_id',
			'address',
			'address2',
			'district',
			[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "city_id",
            "value" => function($model){
                if ($rel = $model->getCity()->one()) {
                    return yii\helpers\Html::a($rel->city_id,["city/view","id" => $rel->city_id],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
],
			'postal_code',
			'phone',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
</div>
