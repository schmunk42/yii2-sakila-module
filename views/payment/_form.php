<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\Payment $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="payment-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ?
        'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <div class="row">
        <div class="col-md-7">
            		<?= $form->field($model, 'customer_id')->textInput() ?>

		<?= $form->field($model, 'staff_id')->textInput() ?>

		<?= \dosamigos\selectize\Selectize::widget([
    'model' => $model,
    'attribute' => 'amount',
    'clientOptions' => [
        'delimiter' => ',',
        'plugins' => ['remove_button'],
        'persist' => false,
        'create' => new \yii\web\JsExpression('function(input){
            return {value: input, text: input};
        }'),
    ]
]) ?>

		<?= $form->field($model, 'payment_date')->textInput() ?>

		<?= $form->field($model, 'last_update')->widget(\zhuravljov\widgets\DateTimePicker::className(), [
    'options' => ['class' => 'form-control'],
    'clientOptions' => [
        'autoclose' => true,
        'todayHighlight' => true,
    ],
]) ?>

		<?= $form->field($model, 'rental_id')->textInput() ?>

        </div>
        <div class="col-md-3">
            <h3><?= \yii\helpers\Html::a('Customer', ['customer/index']) ?></h3><h3><?= \yii\helpers\Html::a('Rental', ['rental/index']) ?></h3><h3><?= \yii\helpers\Html::a('Staff', ['staff/index']) ?></h3>        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ?
        'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
