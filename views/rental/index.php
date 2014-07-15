<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var schmunk42\sakila\models\RentalSearch $searchModel
*/

$this->title = 'Rentals';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="rental-index">

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
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Payment</i>',
        'url' => [
            'payment/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-left"> Customer</i>',
        'url' => [
            'customer/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-left"> Inventory</i>',
        'url' => [
            'inventory/index',
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
        
			'rental_id',
			'rental_date',
			[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "inventory_id",
            "value" => function($model){
                if ($rel = $model->getInventory()->one()) {
                    return yii\helpers\Html::a($rel->label,["inventory/view","id" => $rel->inventory_id],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
],
			[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "customer_id",
            "value" => function($model){
                if ($rel = $model->getCustomer()->one()) {
                    return yii\helpers\Html::a($rel->label,["customer/view","id" => $rel->customer_id],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
],
			'return_date',
			[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "staff_id",
            "value" => function($model){
                if ($rel = $model->getStaff()->one()) {
                    return yii\helpers\Html::a($rel->staff_id,["staff/view","id" => $rel->staff_id],["data-pjax"=>0]);
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
