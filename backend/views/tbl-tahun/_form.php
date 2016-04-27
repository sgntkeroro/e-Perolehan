<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblTahun */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-tahun-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tahun_tahun')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>