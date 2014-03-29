<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\Rental $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="rental-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">

        <?php if (!$model->isNewRecord) { ?>
        <?= Html::a('View', ['view', 'id'=>\Yii::$app->request->getQueryParam('id')], ['class' => 'btn btn-default']) ?>
        <?php } else {?>
        <?= Html::a('Manage', ['index'], ['class' => 'btn btn-inverted']) ?>
        <?php } ?>
    </div>

    <?php $this->beginBlock('main'); ?>    		<?= $form->field($model, 'rental_date')->textInput() ?>

		<?= '<label>inventory_id</label>'.\dosamigos\selectize\Selectize::widget([
    'model' => $model,
    'attribute' => 'inventory_id',
    'clientOptions' => [
        'delimiter' => ',',
        'plugins' => ['remove_button'],
        'persist' => false,
        'create' => new \yii\web\JsExpression('function(input){
            return {value: input, text: input};
        }'),
    ]
]) ?>

		<?= '<label>customer_id</label>'.\dosamigos\selectize\Selectize::widget([
    'model' => $model,
    'attribute' => 'customer_id',
    'clientOptions' => [
        'delimiter' => ',',
        'plugins' => ['remove_button'],
        'persist' => false,
        'create' => new \yii\web\JsExpression('function(input){
            return {value: input, text: input};
        }'),
    ]
]) ?>

		<?= '<label>staff_id</label>'.\dosamigos\selectize\Selectize::widget([
    'model' => $model,
    'attribute' => 'staff_id',
    'clientOptions' => [
        'delimiter' => ',',
        'plugins' => ['remove_button'],
        'persist' => false,
        'create' => new \yii\web\JsExpression('function(input){
            return {value: input, text: input};
        }'),
    ]
]) ?>

		<?= $form->field($model, 'last_update')->widget(\zhuravljov\widgets\DateTimePicker::className(), [
    'options' => ['class' => 'form-control'],
    'clientOptions' => [
        'autoclose' => true,
        'todayHighlight' => true,
    ],
]) ?>

		<?= $form->field($model, 'return_date')->textInput() ?>

    <?php $this->endBlock(); ?>
    
    <?php $this->beginBlock('Payments'); ?><h3><?= \yii\helpers\Html::a('Payments', ['payment/index']) ?></h3><?php echo '' ?><?php $this->endBlock(); ?>
    <?=
    \yii\bootstrap\Tabs::widget(
                 [
                     'items' => [ [
    'label'   => 'main',
    'content' => $this->blocks['main'],
    'active'  => true,
],[
    'label'   => 'Payments',
    'content' => $this->blocks['Payments'],
    'active'  => false,
], ]
                 ]
    );
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Save', ['class' => $model->isNewRecord ?
        'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
