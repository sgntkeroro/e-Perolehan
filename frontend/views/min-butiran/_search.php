<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\MinButiranSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="min-butiran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'minit_bil') ?>

    <?= $form->field($model, 'minit_tarikh') ?>

    <?= $form->field($model, 'minit_masa') ?>

    <?= $form->field($model, 'minit_tempat') ?>

    <?php // echo $form->field($model, 'minit_notakaki') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
