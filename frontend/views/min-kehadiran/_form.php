<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\MinKehadiran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="min-kehadiran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'min_id')->textInput() ?>

    <?= $form->field($model, 'hadir_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hadir_jawatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hadir_peranan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
