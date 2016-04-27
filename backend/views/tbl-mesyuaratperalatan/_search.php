<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblMesyuaratperalatanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-mesyuaratperalatan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mesy_id') ?>

    <?= $form->field($model, 'alat_id') ?>

    <?= $form->field($model, 'mesy_kuantiti') ?>

    <?= $form->field($model, 'mesy_jumlahHarga') ?>

    <?= $form->field($model, 'mesy_catitan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
