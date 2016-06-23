<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblEmailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-email-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'email_id') ?>

    <?= $form->field($model, 'receiver_name') ?>

    <?= $form->field($model, 'receiver_email') ?>

    <?= $form->field($model, 'content') ?>

    <?= $form->field($model, 'attachment') ?>

    <?php // echo $form->field($model, 'subject') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
