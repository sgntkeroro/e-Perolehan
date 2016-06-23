<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use frontend\models\TblBahagian;
use frontend\models\TblUnit;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblModerator */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-moderator-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></h1>
        </div>
        <div class="panel-body">
            <div class='col-lg-4'>
                <?= $form->field($model, 'mod_nama')->textInput() ?>
            </div>
            <div class='col-lg-4'>
                <?= $form->field($model, 'mod_tel')->textInput() ?>
            </div>
            <div class='col-lg-4'>
                <?= $form->field($model, 'mod_pekerjaNo')->textInput() ?>
            </div>
        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">
            <h1 class="panel-title"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></h1>
        </div>
        <div class="panel-body">
            <div class='col-lg-4'>
                <?= $form->field($modelsBahagian, 'bahagian_id')->dropDownList(
                    ArrayHelper::map(TblBahagian::find()->all(), 'bahagian_id', 'bahagian_nama'),
                [
                    'prompt'=>'Pilih Bahagian',
                    'onchange'=>'
                        $.post("index.php?r=tbl-moderator/lists&id='.'"+$(this).val(), function( data ) {
                            $( "select#tblbhgnmod-unit_id" ).html( data );
                        });'
                ]); ?>
            </div>
            <div class='col-lg-4'>
                <?= $form->field($modelsBahagian, 'unit_id')->dropDownList(
                    ArrayHelper::map(TblUnit::find()->all(),'unit_id','unit_nama'),
                    ['prompt'=>'Sila Pilih unit']
                ) ?>
            </div>
            <div class='col-lg-4'>
                <?= $form->field($modelsBahagian, 'unit_kampuscawangan')->textInput() ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Hantar' : 'Hantar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>