<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPengesahanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-pengesahan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'sah_id') ?>

    <?= $form->field($model, 'permohonan_id') ?>

    <?= $form->field($model, 'statSah_id') ?>

    <?= $form->field($model, 'sah_tarikh') ?>

    <?= $form->field($model, 'sah_catitan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
