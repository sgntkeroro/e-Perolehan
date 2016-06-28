<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\TblEmail */

$this->title = 'Email';
?>
<div class="panel panel-primary">
    <div class = "panel-heading" style = "text-align:center">
        <h4><b>
            <?= Html::a('<span class="glyphicon glyphicon-home" aria-hidden="true"></span>', ['/site/index'], [
                'class' => 'btn btn-info',
                'data-toggle'=>'tooltip', 
                'title'=>'HOME'
            ]); ?><br><br>
            Notifikasi melalui email
        </b></h4>
    </div>
    <div class = "panel-body">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <div class = "col-lg-4">
            <?= $form->field($model, 'receiver_name')->textInput(['value'=>'Nurhazwani Abdullah', 'readonly' => true]) ?>
            <?= $form->field($model, 'receiver_email')->textInput(['value'=>'nurhazwani9203@salam.uitm.edu.my', 'readonly' => true]) ?>
            <?= $form->field($model, 'subject')->textInput(['value'=>'Permohonan Baru '.$bhgn->bahagian_nama.', '.$unit->unit_nama, 'readonly' => true]) ?>
        </div>

        <div class = "col-lg-12">
            <?= $form->field($model, 'content')->textarea(['rows' => 8]) ?>
        </div>

        <div class = "col-lg-4 form-group">
            <?= $form->field($model, 'attachment')->fileInput(['maxlength' => true]) ?><br>
            <?= Html::submitButton($model->isNewRecord ? 'Send' : 'Send', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
