<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var schmunk42\sakila\models\StoreSearch $searchModel
*/

$this->title = 'Stores';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="store-index">

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
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Customer</i>',
        'url' => [
            'customer/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Inventory</i>',
        'url' => [
            'inventory/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Staff</i>',
        'url' => [
            'staff/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-left"> Address</i>',
        'url' => [
            'address/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-left"> Staff</i>',
        'url' => [
            'staff/index',
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
        
			'store_id',
			[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "manager_staff_id",
            "value" => function($model){
                if ($rel = $model->getManagerStaff()->one()) {
                    return yii\helpers\Html::a($rel->staff_id,["staff/view","id" => $rel->staff_id],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
],
			[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "address_id",
            "value" => function($model){
                if ($rel = $model->getAddress()->one()) {
                    return yii\helpers\Html::a($rel->address_id,["address/view","id" => $rel->address_id],["data-pjax"=>0]);
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
