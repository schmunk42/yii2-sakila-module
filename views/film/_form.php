<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\Film $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="film-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ?
        'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <div class="row">
        <div class="col-md-7">
            		<?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

		<?= $form->field($model, 'language_id')->textInput() ?>

		<?= $form->field($model, 'last_update')->widget(\zhuravljov\widgets\DateTimePicker::className(), [
    'options' => ['class' => 'form-control'],
    'clientOptions' => [
        'autoclose' => true,
        'todayHighlight' => true,
    ],
]) ?>

		<?= $form->field($model, 'description')->widget(
    \dosamigos\ckeditor\CKEditor::className(),
    [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

		<?= $form->field($model, 'rating')->textInput() ?>

		<?= $form->field($model, 'special_features')->textInput(['maxlength' => 0]) ?>

		<?= $form->field($model, 'release_year')->textInput(['maxlength' => 4]) ?>

		<?= $form->field($model, 'original_language_id')->textInput() ?>

		<?= $form->field($model, 'rental_duration')->widget(\kartik\widgets\RangeInput::classname(), [
    'options' => ['placeholder' => 'Rate (0 - 5)...'],
    'html5Options' => ['min' => 0, 'max' => 5],
    'addon' => ['append' => ['content' => '<i class="glyphicon glyphicon-star"></i>']]
]); ?>

		<?= $form->field($model, 'length')->textInput() ?>

		<?= $form->field($model, 'rental_rate')->textInput(['maxlength' => 4]) ?>

		<?= $form->field($model, 'replacement_cost')->textInput(['maxlength' => 5]) ?>

        </div>
        <div class="col-md-3">
            		schmunk42\sakila\models\Language 		schmunk42\sakila\models\Language 		schmunk42\sakila\models\FilmActor 		schmunk42\sakila\models\Actor 1		schmunk42\sakila\models\FilmCategory 		schmunk42\sakila\models\Category 1		schmunk42\sakila\models\Inventory 1            Relations (tbd)
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ?
        'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
