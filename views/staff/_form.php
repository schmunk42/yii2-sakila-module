<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\Staff $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="staff-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ?
        'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <div class="row">
        <div class="col-md-7">
            		<?= $form->field($model, 'first_name')->textInput(['maxlength' => 45]) ?>

		<?= $form->field($model, 'last_name')->textInput(['maxlength' => 45]) ?>

		<?= $form->field($model, 'address_id')->textInput() ?>

		<?= $form->field($model, 'store_id')->textInput() ?>

		<?= $form->field($model, 'username')->textInput(['maxlength' => 16]) ?>

		<?= $form->field($model, 'last_update')->widget(\zhuravljov\widgets\DateTimePicker::className(), [
    'options' => ['class' => 'form-control'],
    'clientOptions' => [
        'autoclose' => true,
        'todayHighlight' => true,
    ],
]) ?>

		<?= $form->field($model, 'active')->textInput() ?>

		<?= $form->field($model, 'picture')->textInput() ?>

		<?= $form->field($model, 'email')->textInput(['maxlength' => 50]) ?>

		<?= $form->field($model, 'password')->passwordInput(['maxlength' => 40]) ?>

        </div>
        <div class="col-md-3">
            		schmunk42\sakila\models\Payment 1		schmunk42\sakila\models\Rental 1		schmunk42\sakila\models\Address 		schmunk42\sakila\models\Store 		schmunk42\sakila\models\Store 1            Relations (tbd)
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ?
        'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
