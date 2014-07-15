<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\Rental $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="rental-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>
        <p>
            
			<?= $form->field($model, 'rental_date')->textInput() ?>
			<?= $form->field($model, 'inventory_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(schmunk42\sakila\models\Inventory::find()->all(),'inventory_id','label'),
    ['prompt'=>'Choose...']    // active field
); ?>
			<?= $form->field($model, 'customer_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(schmunk42\sakila\models\Customer::find()->all(),'customer_id','label'),
    ['prompt'=>'Choose...']    // active field
); ?>
			<?= $form->field($model, 'staff_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(schmunk42\sakila\models\Staff::find()->all(),'staff_id','staff_id'),
    ['prompt'=>'Choose...']    // active field
); ?>
			<?= $form->field($model, 'return_date')->textInput() ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    \yii\bootstrap\Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Rental',
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
