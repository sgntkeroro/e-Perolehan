<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblCspi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-cspi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'cspi_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cspi_tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cspi_pekerjaNo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
