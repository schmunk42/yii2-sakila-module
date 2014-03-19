<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\Inventory $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="inventory-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ?
        'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <div class="row">
        <div class="col-md-7">
            		<?= $form->field($model, 'film_id')->textInput() ?>

		<?= $form->field($model, 'store_id')->textInput() ?>

		<?= $form->field($model, 'last_update')->widget(\zhuravljov\widgets\DateTimePicker::className(), [
    'options' => ['class' => 'form-control'],
    'clientOptions' => [
        'autoclose' => true,
        'todayHighlight' => true,
    ],
]) ?>

        </div>
        <div class="col-md-3">
            <h3><?= \yii\helpers\Html::a('Film', ['film/index']) ?></h3><h3><?= \yii\helpers\Html::a('Store', ['store/index']) ?></h3><h3><?= \yii\helpers\Html::a('Rentals', ['rental/index']) ?></h3>        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ?
        'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
