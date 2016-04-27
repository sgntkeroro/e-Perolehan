<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblDekanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-dekan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'dekan_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'dekan_nama') ?>

    <?= $form->field($model, 'dekan_tel') ?>

    <?= $form->field($model, 'dekan_pekerjaNo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
