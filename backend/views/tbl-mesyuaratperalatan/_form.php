<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblMesyuaratperalatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-mesyuaratperalatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'alat_id')->textInput() ?>

    <?= $form->field($model, 'mesy_kuantiti')->textInput() ?>

    <?= $form->field($model, 'mesy_jumlahHarga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mesy_catitan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
