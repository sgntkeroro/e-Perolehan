<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblSysop */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-sysop-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'sys_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sys_tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sys_pekerjaNo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
