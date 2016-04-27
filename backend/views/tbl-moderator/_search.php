<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblModeratorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-moderator-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mod_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'mod_nama') ?>

    <?= $form->field($model, 'mod_tel') ?>

    <?= $form->field($model, 'mod_pekerjaNo') ?>

    <?php // echo $form->field($model, 'bm_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
