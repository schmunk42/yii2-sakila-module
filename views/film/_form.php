<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\Film $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="film-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>
        <p>
            
			<?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'language_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(schmunk42\sakila\models\Language::find()->all(),'language_id','name'),
    ['prompt'=>'Choose...']    // active field
); ?>
			<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
			<?= $form->field($model, 'rating')->dropDownList([ 'G' => 'G', 'PG' => 'PG', 'PG-13' => 'PG-13', 'R' => 'R', 'NC-17' => 'NC-17', ], ['prompt' => '']) ?>
			<?= $form->field($model, 'special_features')->textInput(['maxlength' => 0]) ?>
			<?= $form->field($model, 'release_year')->textInput(['maxlength' => 4]) ?>
			<?= $form->field($model, 'original_language_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(schmunk42\sakila\models\Language::find()->all(),'language_id','name'),
    ['prompt'=>'Choose...']    // active field
); ?>
			<?= $form->field($model, 'rental_duration')->textInput() ?>
			<?= $form->field($model, 'length')->textInput() ?>
			<?= $form->field($model, 'rental_rate')->textInput(['maxlength' => 4]) ?>
			<?= $form->field($model, 'replacement_cost')->textInput(['maxlength' => 5]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    \yii\bootstrap\Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Film',
    'content' => $this->blocks['main'],
    'active'  => true,
], ]
                 ]
    );
    ?>
        <hr/>

        <?= Html::submitButton('<span class="glyphicon glyphicon-check"></span> '.($model->isNewRecord ? 'Create' : 'Save'), ['class' => $model->isNewRecord ?
        'btn btn-primary' : 'btn btn-primary']) ?>

        <?php ActiveForm::end(); ?>

    </div>

</div>
