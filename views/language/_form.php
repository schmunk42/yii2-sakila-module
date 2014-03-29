<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\Language $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="language-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">

        <?php if (!$model->isNewRecord) { ?>
        <?= Html::a('View', ['view', 'id'=>\Yii::$app->request->getQueryParam('id')], ['class' => 'btn btn-default']) ?>
        <?php } else {?>
        <?= Html::a('Manage', ['index'], ['class' => 'btn btn-inverted']) ?>
        <?php } ?>
    </div>

    <?php $this->beginBlock('main'); ?>    		<?= $form->field($model, 'name')->textInput(['maxlength' => 20]) ?>

		<?= $form->field($model, 'last_update')->widget(\zhuravljov\widgets\DateTimePicker::className(), [
    'options' => ['class' => 'form-control'],
    'clientOptions' => [
        'autoclose' => true,
        'todayHighlight' => true,
    ],
]) ?>

    <?php $this->endBlock(); ?>
    
    <?php $this->beginBlock('Films'); ?><h3><?= \yii\helpers\Html::a('Films', ['film/index']) ?></h3><?php echo '' ?><?php $this->endBlock(); ?>
    <?=
    \yii\bootstrap\Tabs::widget(
                 [
                     'items' => [ [
    'label'   => 'main',
    'content' => $this->blocks['main'],
    'active'  => true,
],[
    'label'   => 'Films',
    'content' => $this->blocks['Films'],
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
