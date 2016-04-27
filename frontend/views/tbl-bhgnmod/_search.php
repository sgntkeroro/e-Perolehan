<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblBhgnmodSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-bhgnmod-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'bm_id') ?>

    <?= $form->field($model, 'bahagian_id') ?>

    <?= $form->field($model, 'unit_id') ?>

    <?= $form->field($model, 'unitKC_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
