<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\Store $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="store-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>
        <p>
            
			<?= $form->field($model, 'manager_staff_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(schmunk42\sakila\models\Staff::find()->all(),'staff_id','staff_id'),
    ['prompt'=>'Choose...']    // active field
); ?>
			<?= $form->field($model, 'address_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(schmunk42\sakila\models\Address::find()->all(),'address_id','address_id'),
    ['prompt'=>'Choose...']    // active field
); ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    \yii\bootstrap\Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Store',
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
