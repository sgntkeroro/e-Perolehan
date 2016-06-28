<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\TblModerator;
use frontend\models\TblBhgnmod;
use frontend\models\TblBahagian;
use frontend\models\TblUnit;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblEmail */
/* @var $form yii\widgets\ActiveForm */

$moderator = TblModerator::find()->where(['user_id' => Yii::$app->user->identity->id])->one();
$bm = TblBhgnmod::find()->where(['bm_id' => $moderator->bm_id])->one();
$bhgn = TblBahagian::find()->where(['bahagian_id' => $bm->bahagian_id])->one();
$unit = TblUnit::find()->where(['unit_id' => $bm->unit_id])->one();
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
            <?= $form->field($model, 'receiver_name')->textInput(['value'=>'Siti Hasmah', 'readonly' => true]) ?>
            <?= $form->field($model, 'receiver_email')->textInput(['value'=>'hasmah.seroji@gmail.com', 'readonly' => true]) ?>
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
