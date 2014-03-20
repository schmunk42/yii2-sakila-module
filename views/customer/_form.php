<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\Customer $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="form-group">

        <?php if (!$model->isNewRecord) { ?>
        <?= Html::a('View', ['view', 'id'=>\Yii::$app->request->getQueryParam('id')], ['class' => 'btn btn-default']) ?>
        <?php } else {?>
        <?= Html::a('Manage', ['index'], ['class' => 'btn btn-inverted']) ?>
        <?php } ?>
    </div>

    <?php $this->beginBlock('main'); ?>    		<?= '<label>store_id</label>'.\dosamigos\selectize\Selectize::widget([
    'model' => $model,
    'attribute' => 'store_id',
    'clientOptions' => [
        'delimiter' => ',',
        'plugins' => ['remove_button'],
        'persist' => false,
        'create' => new \yii\web\JsExpression('function(input){
            return {value: input, text: input};
        }'),
    ]
]) ?>

		<?= $form->field($model, 'first_name')->textInput(['maxlength' => 45]) ?>

		<?= $form->field($model, 'last_name')->textInput(['maxlength' => 45]) ?>

		<?= '<label>address_id</label>'.\dosamigos\selectize\Selectize::widget([
    'model' => $model,
    'attribute' => 'address_id',
    'clientOptions' => [
        'delimiter' => ',',
        'plugins' => ['remove_button'],
        'persist' => false,
        'create' => new \yii\web\JsExpression('function(input){
            return {value: input, text: input};
        }'),
    ]
]) ?>

		<?= $form->field($model, 'create_date')->textInput() ?>

		<?= $form->field($model, 'last_update')->widget(\zhuravljov\widgets\DateTimePicker::className(), [
    'options' => ['class' => 'form-control'],
    'clientOptions' => [
        'autoclose' => true,
        'todayHighlight' => true,
    ],
]) ?>

		<?= $form->field($model, 'active')->textInput() ?>

		<?= $form->field($model, 'email')->textInput(['maxlength' => 50]) ?>

    <?php $this->endBlock(); ?>
    
    <?php $this->beginBlock('Payments'); ?><h3><?= \yii\helpers\Html::a('Payments', ['payment/index']) ?></h3><?php echo '' ?><?php $this->endBlock(); ?><?php $this->beginBlock('Rentals'); ?><h3><?= \yii\helpers\Html::a('Rentals', ['rental/index']) ?></h3><?php echo '' ?><?php $this->endBlock(); ?>
    <?=
    \yii\bootstrap\Tabs::widget(
                 [
                     'items' => [ [
    'label'   => 'main',
    'content' => $this->blocks['main'],
    'active'  => true,
],[
    'label'   => 'Payments',
    'content' => $this->blocks['Payments'],
    'active'  => false,
],[
    'label'   => 'Rentals',
    'content' => $this->blocks['Rentals'],
    'active'  => false,
], ]
                 ]
    );
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Save', ['class' => $model->isNewRecord ?
        'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
