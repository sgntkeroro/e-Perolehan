<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblSuratpengesahanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-suratpengesahan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'suratSah_id') ?>

    <?= $form->field($model, 'permohonan_id') ?>

    <?= $form->field($model, 'suratSah_path') ?>

    <?= $form->field($model, 'suratSah_type') ?>

    <?= $form->field($model, 'suratSah_size') ?>

    <?php // echo $form->field($model, 'suratSah_nama') ?>

    <?php // echo $form->field($model, 'suratSah_tarikh') ?>

    <?php // echo $form->field($model, 'suratSah_deskripsi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
