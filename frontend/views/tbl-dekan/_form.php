<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblDekan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-dekan-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></h1>
        </div>
        <div class="panel-body">
            <div class='col-lg-4'>
                <?= $form->field($model, 'dekan_nama')->textInput() ?>
            </div>
            <div class='col-lg-4'>
                <?= $form->field($model, 'dekan_tel')->textInput() ?>
            </div>
            <div class='col-lg-4'>
                <?= $form->field($model, 'dekan_pekerjaNo')->textInput() ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
