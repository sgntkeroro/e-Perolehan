<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use frontend\models\TblRole;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class = "panel panel-primary">
    <div class = "panel-heading" style = "text-align:center"><h4><b>Butiran Pengguna</b></h4></div>
    <div class = "panel-body">
        <?php $form = ActiveForm::begin(); ?>

        <div class = "col-lg-4"><?= $form->field($model, 'username')->textInput(['readonly' => true]) ?></div>

        <div class = "col-lg-4"><?= $form->field($model, 'email')->textInput(['readonly' => true]) ?></div>

        <div class = "col-lg-4"><?= $form->field($model, 'role_id')->label('Role')->dropDownList(ArrayHelper::map(TblROLE::find()->all(),'role_id','role_name')) ?></div>

        <?php //$form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

        <?php //$form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

        <?php //$form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

        <?php //$form->field($model, 'status')->textInput() ?>

        <?php //$form->field($model, 'created_at')->textInput() ?>

        <?php //$form->field($model, 'updated_at')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Hantar' : 'Hantar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
