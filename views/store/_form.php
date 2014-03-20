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

        <?php if (!$model->isNewRecord) { ?>
        <?= Html::a('View', ['view', 'id'=>\Yii::$app->request->getQueryParam('id')], ['class' => 'btn btn-default']) ?>
        <?php } else {?>
        <?= Html::a('Manage', ['index'], ['class' => 'btn btn-inverted']) ?>
        <?php } ?>
    </div>

    <?php $this->beginBlock('main'); ?>    		<?= '<label>manager_staff_id</label>'.\dosamigos\selectize\Selectize::widget([
    'model' => $model,
    'attribute' => 'manager_staff_id',
    'clientOptions' => [
        'delimiter' => ',',
        'plugins' => ['remove_button'],
        'persist' => false,
        'create' => new \yii\web\JsExpression('function(input){
            return {value: input, text: input};
        }'),
    ]
]) ?>

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

		<?= $form->field($model, 'last_update')->widget(\zhuravljov\widgets\DateTimePicker::className(), [
    'options' => ['class' => 'form-control'],
    'clientOptions' => [
        'autoclose' => true,
        'todayHighlight' => true,
    ],
]) ?>

    <?php $this->endBlock(); ?>
    
    <?php $this->beginBlock('Customers'); ?><h3><?= \yii\helpers\Html::a('Customers', ['customer/index']) ?></h3><?php echo '' ?><?php $this->endBlock(); ?><?php $this->beginBlock('Inventories'); ?><h3><?= \yii\helpers\Html::a('Inventories', ['inventory/index']) ?></h3><?php echo '' ?><?php $this->endBlock(); ?><?php $this->beginBlock('Staff'); ?><h3><?= \yii\helpers\Html::a('Staff', ['staff/index']) ?></h3><?php echo '' ?><?php $this->endBlock(); ?>
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
    'label'   => 'Inventories',
    'content' => $this->blocks['Inventories'],
    'active'  => false,
],[
    'label'   => 'Staff',
    'content' => $this->blocks['Staff'],
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
