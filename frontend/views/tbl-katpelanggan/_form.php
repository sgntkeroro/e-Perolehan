<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblKatpelanggan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-katpelanggan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pelanggan_nama')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
