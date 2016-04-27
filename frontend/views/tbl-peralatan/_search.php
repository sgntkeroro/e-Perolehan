<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPeralatanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-peralatan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'alat_id') ?>

    <?= $form->field($model, 'permohonan_id') ?>

    <?= $form->field($model, 'alat_nama') ?>

    <?= $form->field($model, 'alat_kodAkaun') ?>

    <?= $form->field($model, 'alat_kuantiti') ?>

    <?php // echo $form->field($model, 'alat_hargaUnit') ?>

    <?php // echo $form->field($model, 'alat_jumlahHarga') ?>

    <?php // echo $form->field($model, 'jk_id') ?>

    <?php // echo $form->field($model, 'katPelanggan_id') ?>

    <?php // echo $form->field($model, 'alat_tujuan') ?>

    <?php // echo $form->field($model, 'katPermohonan_id') ?>

    <?php // echo $form->field($model, 'alat_jenisPeruntukan') ?>

    <?php // echo $form->field($model, 'alat_programBaru') ?>

    <?php // echo $form->field($model, 'alat_tahap') ?>

    <?php // echo $form->field($model, 'tahunSedia_id') ?>

    <?php // echo $form->field($model, 'alat_pegawai') ?>

    <?php // echo $form->field($model, 'alat_jawatan') ?>

    <?php // echo $form->field($model, 'alat_lokasi') ?>

    <?php // echo $form->field($model, 'alat_bukuLog') ?>

    <?php // echo $form->field($model, 'bukuLog_id') ?>

    <?php // echo $form->field($model, 'deleteBukuLog') ?>

    <?php // echo $form->field($model, 'sort_order') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
