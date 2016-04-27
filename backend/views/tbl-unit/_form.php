<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblUnit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-unit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'unit_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bahagian_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
