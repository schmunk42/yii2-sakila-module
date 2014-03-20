<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\Film $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="film-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="form-group">

        <?php if (!$model->isNewRecord) { ?>
        <?= Html::a('View', ['view', 'id'=>\Yii::$app->request->getQueryParam('id')], ['class' => 'btn btn-default']) ?>
        <?php } else {?>
        <?= Html::a('Manage', ['index'], ['class' => 'btn btn-inverted']) ?>
        <?php } ?>
    </div>

    <?php $this->beginBlock('main'); ?>    		<?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

		<?= '<label>language_id</label>'.\dosamigos\selectize\Selectize::widget([
    'model' => $model,
    'attribute' => 'language_id',
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

		<?= $form->field($model, 'description')->widget(
    \dosamigos\ckeditor\CKEditor::className(),
    [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

		<?= $form->field($model, 'rating')->textInput() ?>

		<?= $form->field($model, 'special_features')->textInput(['maxlength' => 0]) ?>

		<?= $form->field($model, 'release_year')->textInput(['maxlength' => 4]) ?>

		<?= '<label>original_language_id</label>'.\dosamigos\selectize\Selectize::widget([
    'model' => $model,
    'attribute' => 'original_language_id',
    'clientOptions' => [
        'delimiter' => ',',
        'plugins' => ['remove_button'],
        'persist' => false,
        'create' => new \yii\web\JsExpression('function(input){
            return {value: input, text: input};
        }'),
    ]
]) ?>

		<?= $form->field($model, 'rental_duration')->widget(\kartik\widgets\RangeInput::classname(), [
    'options' => ['placeholder' => 'Rate (0 - 5)...'],
    'html5Options' => ['min' => 0, 'max' => 5],
    'addon' => ['append' => ['content' => '<i class="glyphicon glyphicon-star"></i>']]
]); ?>

		<?= $form->field($model, 'length')->textInput() ?>

		<?= $form->field($model, 'rental_rate')->textInput(['maxlength' => 4]) ?>

		<?= $form->field($model, 'replacement_cost')->textInput(['maxlength' => 5]) ?>

    <?php $this->endBlock(); ?>
    
    <?php $this->beginBlock('Actors'); ?><h3><?= \yii\helpers\Html::a('Actors', ['actor/index']) ?></h3><?php echo '<label>Relation</label>'.\dosamigos\selectize\Selectize::widget([
    #'model' => $model->actors,
    'name' => 'actor_id',
    'clientOptions' => [
        'delimiter' => ',',
        'plugins' => ['remove_button'],
        'persist' => false,
        'create' => new \yii\web\JsExpression('function(input){
            return {value: input, text: input};
        }'),
    ]
]) ?><?php $this->endBlock(); ?><?php $this->beginBlock('Categories'); ?><h3><?= \yii\helpers\Html::a('Categories', ['category/index']) ?></h3><?php echo '<label>Relation</label>'.\dosamigos\selectize\Selectize::widget([
    #'model' => $model->categories,
    'name' => 'category_id',
    'clientOptions' => [
        'delimiter' => ',',
        'plugins' => ['remove_button'],
        'persist' => false,
        'create' => new \yii\web\JsExpression('function(input){
            return {value: input, text: input};
        }'),
    ]
]) ?><?php $this->endBlock(); ?><?php $this->beginBlock('Inventories'); ?><h3><?= \yii\helpers\Html::a('Inventories', ['inventory/index']) ?></h3><?php echo '' ?><?php $this->endBlock(); ?>
    <?=
    \yii\bootstrap\Tabs::widget(
                 [
                     'items' => [ [
    'label'   => 'main',
    'content' => $this->blocks['main'],
    'active'  => true,
],[
    'label'   => 'Actors',
    'content' => $this->blocks['Actors'],
    'active'  => false,
],[
    'label'   => 'Categories',
    'content' => $this->blocks['Categories'],
    'active'  => false,
],[
    'label'   => 'Inventories',
    'content' => $this->blocks['Inventories'],
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
