<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var schmunk42\sakila\models\StaffSearch $searchModel
*/

$this->title = 'Staff';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="staff-index">

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
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Rental</i>',
        'url' => [
            'rental/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-left"> Address</i>',
        'url' => [
            'address/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-left"> Store</i>',
        'url' => [
            'store/index',
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
        
			'staff_id',
			'first_name',
			'last_name',
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
			'picture',
			'email:email',
			[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "store_id",
            "value" => function($model){
                if ($rel = $model->getStore()->one()) {
                    return yii\helpers\Html::a($rel->store_id,["store/view","id" => $rel->store_id],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
],
			/*'active'*/
			/*'username'*/
			/*'password'*/
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
</div>
