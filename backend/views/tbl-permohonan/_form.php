<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPermohonan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-permohonan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'permohonan_tarikh')->textInput() ?>

    <?= $form->field($model, 'permohonan_pusatKos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'statMohon_id')->textInput() ?>

    <?= $form->field($model, 'dekan_id')->textInput() ?>

    <?= $form->field($model, 'status_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
