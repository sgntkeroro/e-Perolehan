<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPermohonanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-permohonan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'permohonan_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'permohonan_tarikh') ?>

    <?= $form->field($model, 'permohonan_pusatKos') ?>

    <?= $form->field($model, 'statMohon_id') ?>

    <?php // echo $form->field($model, 'dekan_id') ?>

    <?php // echo $form->field($model, 'status_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
