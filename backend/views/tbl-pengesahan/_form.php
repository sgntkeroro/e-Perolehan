<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPengesahan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-pengesahan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'permohonan_id')->textInput() ?>

    <?= $form->field($model, 'statSah_id')->textInput() ?>

    <?= $form->field($model, 'sah_tarikh')->textInput() ?>

    <?= $form->field($model, 'sah_catitan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
