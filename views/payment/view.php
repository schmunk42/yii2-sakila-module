<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\Payment $model
*/

$this->title = 'Payment View ' . $model->payment_id . '';
$this->params['breadcrumbs'][] = ['label' => 'Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->payment_id, 'url' => ['view', 'id' => $model->payment_id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="payment-view">

    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Edit', ['update', 'id' => $model->payment_id],
        ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> New', ['create'], ['class' => 'btn
        btn-success']) ?>
    </p>

        <p class='pull-right'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> List', ['index'], ['class'=>'btn btn-default']) ?>
    </p><div class='clearfix'></div> 

    
    <?php $this->beginBlock('schmunk42\sakila\models\Payment'); ?>

    <h3>
        <?= $model->payment_id ?>    </h3>

    <?php echo DetailView::widget([
    'model' => $model,
    'attributes' => [
    'payment_id',
[
    'format'=>'html',
    'attribute'=>'customer_id',
    'value' => Html::a($model->getCustomer()->one()?$model->getCustomer()->one()->label:'', ['customer/view', 'id' => $model->customer_id]),
],
[
    'format'=>'html',
    'attribute'=>'staff_id',
    'value' => Html::a($model->getStaff()->one()?$model->getStaff()->one()->staff_id:'', ['staff/view', 'id' => $model->staff_id]),
],
[
    'format'=>'html',
    'attribute'=>'rental_id',
    'value' => Html::a($model->getRental()->one()?$model->getRental()->one()->rental_id:'', ['rental/view', 'id' => $model->rental_id]),
],
'amount',
'payment_date',
'last_update',
    ],
    ]); ?>

    <hr/>

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'id' => $model->payment_id],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
    'data-method' => 'post',
    ]); ?>

    <?php $this->endBlock(); ?>


    
    <?=
    \yii\bootstrap\Tabs::widget(
                 [
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> Payment',
    'content' => $this->blocks['schmunk42\sakila\models\Payment'],
    'active'  => true,
], ]
                 ]
    );
    ?></div>

