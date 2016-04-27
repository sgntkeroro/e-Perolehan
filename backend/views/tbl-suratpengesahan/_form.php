<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblSuratpengesahan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-suratpengesahan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'permohonan_id')->textInput() ?>

    <?= $form->field($model, 'suratSah_path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'suratSah_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'suratSah_size')->textInput() ?>

    <?= $form->field($model, 'suratSah_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'suratSah_tarikh')->textInput() ?>

    <?= $form->field($model, 'suratSah_deskripsi')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
