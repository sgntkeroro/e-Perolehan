<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\MinPerkara */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="min-perkara-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'min_id')->textInput() ?>

    <?= $form->field($model, 'perkara_bil')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perkara_tajuk')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'perkara_isi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'perkara_maklumat')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
