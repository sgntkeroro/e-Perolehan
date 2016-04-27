<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use frontend\models\TblBahagian;
use frontend\models\TblUnit;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblBhgnmod */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-bhgnmod-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bahagian_id')->dropDownList(
        ArrayHelper::map(TblBahagian::find()->all(), 'bahagian_id', 'bahagian_nama'),
	    [
	        'prompt'=>'Pilih Bahagian',
	        'onchange'=>'
	            $.post("index.php?r=tbl-bhgnmod/lists&id='.'"+$(this).val(), function( data ) {
	                $( "select#tblBhgnmod-unit_id" ).html( data );
	            });'
    ]); ?>

    <?= $form->field($model, 'unit_id')->dropDownList(
        ArrayHelper::map(TblUnit::find()->all(),'unit_id','unit_nama'),
        ['prompt'=>'Sila Pilih unit']
    ) ?>

    <?= $form->field($model, 'unitKC_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
