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
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ?
        'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <div class="row">
        <div class="col-md-7">
            		<?= $form->field($model, 'rental_date')->textInput() ?>

		<?= $form->field($model, 'inventory_id')->textInput(['maxlength' => 8]) ?>

		<?= $form->field($model, 'customer_id')->textInput() ?>

		<?= $form->field($model, 'staff_id')->textInput() ?>

		<?= $form->field($model, 'last_update')->widget(\zhuravljov\widgets\DateTimePicker::className(), [
    'options' => ['class' => 'form-control'],
    'clientOptions' => [
        'autoclose' => true,
        'todayHighlight' => true,
    ],
]) ?>

		<?= $form->field($model, 'return_date')->textInput() ?>

        </div>
        <div class="col-md-3">
            <h3><?= \yii\helpers\Html::a('Payments', ['payment/index']) ?></h3><h3><?= \yii\helpers\Html::a('Customer', ['customer/index']) ?></h3><h3><?= \yii\helpers\Html::a('Inventory', ['inventory/index']) ?></h3><h3><?= \yii\helpers\Html::a('Staff', ['staff/index']) ?></h3>        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ?
        'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
