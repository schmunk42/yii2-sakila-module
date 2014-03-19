<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\Customer $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ?
        'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <div class="row">
        <div class="col-md-7">
            		<?= $form->field($model, 'store_id')->textInput() ?>

		<?= $form->field($model, 'first_name')->textInput(['maxlength' => 45]) ?>

		<?= $form->field($model, 'last_name')->textInput(['maxlength' => 45]) ?>

		<?= $form->field($model, 'address_id')->textInput() ?>

		<?= $form->field($model, 'create_date')->textInput() ?>

		<?= $form->field($model, 'last_update')->widget(\zhuravljov\widgets\DateTimePicker::className(), [
    'options' => ['class' => 'form-control'],
    'clientOptions' => [
        'autoclose' => true,
        'todayHighlight' => true,
    ],
]) ?>

		<?= $form->field($model, 'active')->textInput() ?>

		<?= $form->field($model, 'email')->textInput(['maxlength' => 50]) ?>

        </div>
        <div class="col-md-3">
            <h3><?= \yii\helpers\Html::a('Address', ['address/index']) ?></h3><h3><?= \yii\helpers\Html::a('Store', ['store/index']) ?></h3><h3><?= \yii\helpers\Html::a('Payments', ['payment/index']) ?></h3><h3><?= \yii\helpers\Html::a('Rentals', ['rental/index']) ?></h3>        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ?
        'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
