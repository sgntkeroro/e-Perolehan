<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblMesyuaratpermohonanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-mesyuaratpermohonan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mesyPerm_id') ?>

    <?= $form->field($model, 'permohonan_id') ?>

    <?= $form->field($model, 'statMesyua_id') ?>

    <?= $form->field($model, 'mesyPerm_tarikh') ?>

    <?= $form->field($model, 'mesyPerm_catitan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
