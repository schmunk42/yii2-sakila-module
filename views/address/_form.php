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

        <?php if (!$model->isNewRecord) { ?>
        <?= Html::a('View', ['view', 'id'=>\Yii::$app->request->getQueryParam('id')], ['class' => 'btn btn-default']) ?>
        <?php } else {?>
        <?= Html::a('Manage', ['index'], ['class' => 'btn btn-inverted']) ?>
        <?php } ?>
    </div>

    <?php $this->beginBlock('main'); ?>    		<?= $form->field($model, 'address')->textInput(['maxlength' => 50]) ?>

		<?= $form->field($model, 'district')->textInput(['maxlength' => 20]) ?>

		<?= '<label>city_id</label>'.\dosamigos\selectize\Selectize::widget([
    'model' => $model,
    'attribute' => 'city_id',
    'clientOptions' => [
        'delimiter' => ',',
        'plugins' => ['remove_button'],
        'persist' => false,
        'create' => new \yii\web\JsExpression('function(input){
            return {value: input, text: input};
        }'),
    ]
]) ?>

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

    <?php $this->endBlock(); ?>
    
    <?php $this->beginBlock('Customers'); ?><h3><?= \yii\helpers\Html::a('Customers', ['customer/index']) ?></h3><?php echo '' ?><?php $this->endBlock(); ?><?php $this->beginBlock('Staff'); ?><h3><?= \yii\helpers\Html::a('Staff', ['staff/index']) ?></h3><?php echo '' ?><?php $this->endBlock(); ?><?php $this->beginBlock('Stores'); ?><h3><?= \yii\helpers\Html::a('Stores', ['store/index']) ?></h3><?php echo '' ?><?php $this->endBlock(); ?>
    <?=
    \yii\bootstrap\Tabs::widget(
                 [
                     'items' => [ [
    'label'   => 'main',
    'content' => $this->blocks['main'],
    'active'  => true,
],[
    'label'   => 'Customers',
    'content' => $this->blocks['Customers'],
    'active'  => false,
],[
    'label'   => 'Staff',
    'content' => $this->blocks['Staff'],
    'active'  => false,
],[
    'label'   => 'Stores',
    'content' => $this->blocks['Stores'],
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
