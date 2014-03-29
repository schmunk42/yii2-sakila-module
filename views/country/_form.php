<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\Country $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="country-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">

        <?php if (!$model->isNewRecord) { ?>
        <?= Html::a('View', ['view', 'id'=>\Yii::$app->request->getQueryParam('id')], ['class' => 'btn btn-default']) ?>
        <?php } else {?>
        <?= Html::a('Manage', ['index'], ['class' => 'btn btn-inverted']) ?>
        <?php } ?>
    </div>

    <?php $this->beginBlock('main'); ?>    		<?= $form->field($model, 'country')->textInput(['maxlength' => 50]) ?>

		<?= $form->field($model, 'last_update')->widget(\zhuravljov\widgets\DateTimePicker::className(), [
    'options' => ['class' => 'form-control'],
    'clientOptions' => [
        'autoclose' => true,
        'todayHighlight' => true,
    ],
]) ?>

    <?php $this->endBlock(); ?>
    
    <?php $this->beginBlock('Cities'); ?><h3><?= \yii\helpers\Html::a('Cities', ['city/index']) ?></h3><?php echo '' ?><?php $this->endBlock(); ?>
    <?=
    \yii\bootstrap\Tabs::widget(
                 [
                     'items' => [ [
    'label'   => 'main',
    'content' => $this->blocks['main'],
    'active'  => true,
],[
    'label'   => 'Cities',
    'content' => $this->blocks['Cities'],
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
