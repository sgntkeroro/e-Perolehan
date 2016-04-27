<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblBukulogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-bukulog-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'bukulog_id') ?>

    <?= $form->field($model, 'bukulog_path') ?>

    <?= $form->field($model, 'bukulog_type') ?>

    <?= $form->field($model, 'bukulog_size') ?>

    <?= $form->field($model, 'bukulog_nama') ?>

    <?php // echo $form->field($model, 'sort_order') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
