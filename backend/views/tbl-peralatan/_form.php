<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPeralatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-peralatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'permohonan_id')->textInput() ?>

    <?= $form->field($model, 'alat_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alat_kodAkaun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alat_kuantiti')->textInput() ?>

    <?= $form->field($model, 'alat_hargaUnit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alat_jumlahHarga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jk_id')->textInput() ?>

    <?= $form->field($model, 'katPelanggan_id')->textInput() ?>

    <?= $form->field($model, 'alat_tujuan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'katPermohonan_id')->textInput() ?>

    <?= $form->field($model, 'alat_jenisPeruntukan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alat_programBaru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alat_tahap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahunSedia_id')->textInput() ?>

    <?= $form->field($model, 'alat_pegawai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alat_jawatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alat_lokasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alat_bukuLog')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bukuLog_id')->textInput() ?>

    <?= $form->field($model, 'deleteBukuLog')->textInput() ?>

    <?= $form->field($model, 'sort_order')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
