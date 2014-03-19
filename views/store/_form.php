<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\Store $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="store-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ?
        'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <div class="row">
        <div class="col-md-7">
            		<?= $form->field($model, 'manager_staff_id')->textInput() ?>

		<?= $form->field($model, 'address_id')->textInput() ?>

		<?= $form->field($model, 'last_update')->widget(\zhuravljov\widgets\DateTimePicker::className(), [
    'options' => ['class' => 'form-control'],
    'clientOptions' => [
        'autoclose' => true,
        'todayHighlight' => true,
    ],
]) ?>

        </div>
        <div class="col-md-3">
            <h3><?= \yii\helpers\Html::a('Customers', ['customer/index']) ?></h3><h3><?= \yii\helpers\Html::a('Inventories', ['inventory/index']) ?></h3><h3><?= \yii\helpers\Html::a('Staff', ['staff/index']) ?></h3><h3><?= \yii\helpers\Html::a('Address', ['address/index']) ?></h3><h3><?= \yii\helpers\Html::a('ManagerStaff', ['staff/index']) ?></h3>        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ?
        'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
