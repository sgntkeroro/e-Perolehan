<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblSuratpengesahan */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Surat Pengesahan : ' . $model->permohonan_id;
$this->params['breadcrumbs'][] = ['label' => 'Senarai Permohonan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Permohonan', 'url' => ['view', 'id' => $model->permohonan_id]];
$this->params['breadcrumbs'][] = 'Butiran Surat';
?>

<div class="panel panel-info">
	<div class="panel-heading" align="center"><h4><b>BUTIRAN SURAT PENGESAHAN</b></h4></div>
        <div class="panel-body">
        	<div class="tbl-suratpengesahan-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' =>   'multipart/form-data']]); ?>

    <div class="col-lg-6">
        <?= $form->field($model, 'permohonan_id')->textInput(['readonly' => true]) ?>
    </div>
    <div class="col-lg-6">
        <?= $form->field($modelsSurat, 'suratSah_tarikh')->textInput(['readonly' => true, 'value'=>date('Y-m-d')]) ?>
    </div>
    <div class="col-lg-12">
        <?= $form->field($modelsSurat, 'suratSah_nama')->fileInput() ?>
    </div>
    <div class="col-lg-12">
        <?= $form->field($modelsSurat, 'suratSah_deskripsi')->textArea(['maxlength' => true]) ?>
    </div> 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Hantar' : 'Hantar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
        </div>
    </div>
</div>

