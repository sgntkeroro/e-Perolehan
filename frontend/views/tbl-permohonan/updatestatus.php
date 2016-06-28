<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPeralatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class = "panel panel-primary">
    <div class = "panel-heading" style = "text-align:center"></div>
    <div class = "panel-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'permohonan_id')->textInput() ?>

        <?= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'kat_id')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'sok_id')->textInput() ?>

        <?= $form->field($model, 'permohonan_tarikh')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'permohonan_pusatKos')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'statMohon_id')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'status_id')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Hantar' : 'Hantar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
