<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\mesyuarat\models\Statmesyua */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="statmesyua-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'statMesyua_status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
