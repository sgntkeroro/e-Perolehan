<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\MinKehadiranSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="min-kehadiran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'min_id') ?>

    <?= $form->field($model, 'hadir_nama') ?>

    <?= $form->field($model, 'hadir_jawatan') ?>

    <?= $form->field($model, 'hadir_peranan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
