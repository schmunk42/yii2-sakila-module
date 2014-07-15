<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
* @var yii\web\View $this
* @var schmunk42\sakila\models\FilmCategory $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="film-category-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>
        <p>
            
			<?= $form->field($model, 'film_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(schmunk42\sakila\models\Film::find()->all(),'film_id','title'),
    ['prompt'=>'Choose...']    // active field
); ?>
			<?= $form->field($model, 'category_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(schmunk42\sakila\models\Category::find()->all(),'category_id','name'),
    ['prompt'=>'Choose...']    // active field
); ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    \yii\bootstrap\Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'FilmCategory',
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
