<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblBukulog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-bukulog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bukulog_path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bukulog_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bukulog_size')->textInput() ?>

    <?= $form->field($model, 'bukulog_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sort_order')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
