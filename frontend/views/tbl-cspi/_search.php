<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblCspiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-cspi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cspi_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'cspi_nama') ?>

    <?= $form->field($model, 'cspi_tel') ?>

    <?= $form->field($model, 'cspi_pekerjaNo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
