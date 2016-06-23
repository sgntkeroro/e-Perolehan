<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\MinPerkaraSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="min-perkara-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'min_id') ?>

    <?= $form->field($model, 'perkara_bil') ?>

    <?= $form->field($model, 'perkara_tajuk') ?>

    <?= $form->field($model, 'perkara_isi') ?>

    <?php // echo $form->field($model, 'perkara_maklumat') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
