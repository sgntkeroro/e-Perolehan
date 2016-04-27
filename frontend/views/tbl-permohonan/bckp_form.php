<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;

use frontend\models\TblDekan;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPermohonan */
/* @var $form yii\widgets\ActiveForm */
?>

<style type="text/css">
    .textInput {
    height:20px;
    font-size: 11px; 
    padding: 1px 1px 1px 1px;    
  } 
</style>

<div class="tbl-permohonan-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data',
            'id' => 'dynamic-form'
        ]
    ]); ?>

    <div class="row">
        <div class="col-sm-2">
            <?= $form->field($model, 'user_id')->inline(true)->textInput(['value'=>Yii::$app->user->identity->id, 'readonly' => true, 'class' => "textInput"]) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'permohonan_tarikh')->textInput(['value'=>date('Y-m-d'), 'readonly' => true, 'class' => "textInput"]) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'permohonan_pusatKos')->textInput(['maxlength' => true, 'class' => "textInput"]) ?>
        </div>      
        <div class="col-sm-3">
            <?= $form->field($model, 'dekan_id')->dropDownList(
                ArrayHelper::map(TblDekan::find()->all(),'dekan_id','dekan_nama'), ['class' => "textInput"]
            ) ?>
        </div>
    </div>

    <?= $this->render('_form_peralatan', [
        'form' => $form,
        'model' => $model,
        'modelsPeralatan' => $modelsPeralatan
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>