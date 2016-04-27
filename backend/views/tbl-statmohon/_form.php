<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblStatmohon */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-statmohon-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'statMohon_status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
