<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\Customer $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>
        <p>
            
			<?= $form->field($model, 'store_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(schmunk42\sakila\models\Store::find()->all(),'store_id','store_id'),
    ['prompt'=>'Choose...']    // active field
); ?>
			<?= $form->field($model, 'first_name')->textInput(['maxlength' => 45]) ?>
			<?= $form->field($model, 'last_name')->textInput(['maxlength' => 45]) ?>
			<?= $form->field($model, 'address_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(schmunk42\sakila\models\Address::find()->all(),'address_id','address_id'),
    ['prompt'=>'Choose...']    // active field
); ?>
			<?= $form->field($model, 'create_date')->textInput() ?>
			<?= $form->field($model, 'active')->textInput() ?>
			<?= $form->field($model, 'email')->textInput(['maxlength' => 50]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    \yii\bootstrap\Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Customer',
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
