<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\Address $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="address-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ?
        'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <div class="row">
        <div class="col-md-7">
            		<?= $form->field($model, 'address')->textInput(['maxlength' => 50]) ?>

		<?= $form->field($model, 'district')->textInput(['maxlength' => 20]) ?>

		<?= $form->field($model, 'city_id')->textInput() ?>

		<?= $form->field($model, 'phone')->textInput(['maxlength' => 20]) ?>

		<?= $form->field($model, 'last_update')->widget(\zhuravljov\widgets\DateTimePicker::className(), [
    'options' => ['class' => 'form-control'],
    'clientOptions' => [
        'autoclose' => true,
        'todayHighlight' => true,
    ],
]) ?>

		<?= $form->field($model, 'address2')->textInput(['maxlength' => 50]) ?>

		<?= $form->field($model, 'postal_code')->textInput(['maxlength' => 10]) ?>

        </div>
        <div class="col-md-3">
            <h3><?= \yii\helpers\Html::a('City', ['city/index']) ?></h3><h3><?= \yii\helpers\Html::a('Customers', ['customer/index']) ?></h3><h3><?= \yii\helpers\Html::a('Staff', ['staff/index']) ?></h3><h3><?= \yii\helpers\Html::a('Stores', ['store/index']) ?></h3>        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ?
        'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
