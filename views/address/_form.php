<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\Address $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="address-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>
        <p>
            
			<?= $form->field($model, 'address')->textInput(['maxlength' => 50]) ?>
			<?= $form->field($model, 'district')->textInput(['maxlength' => 20]) ?>
			<?= $form->field($model, 'city_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(schmunk42\sakila\models\City::find()->all(),'city_id','city_id'),
    ['prompt'=>'Choose...']    // active field
); ?>
			<?= $form->field($model, 'phone')->textInput(['maxlength' => 20]) ?>
			<?= $form->field($model, 'address2')->textInput(['maxlength' => 50]) ?>
			<?= $form->field($model, 'postal_code')->textInput(['maxlength' => 10]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    \yii\bootstrap\Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Address',
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
