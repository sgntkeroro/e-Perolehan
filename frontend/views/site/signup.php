<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\models\TblRole;
use yii\helpers\ArrayHelper;

$this->title = 'Signup';
?>
<div class="site-signup" align = "center">
    <div class="panel panel-default" style = "width:500px; text-align:center">
        <div class="panel-heading" style = "background-color:#1E1E1E;"><h3><b><font color = "white">Daftar Pengguna</font></b></h3></div>
        <div class="panel-body">

            <p><b><font color = "crimson">* Sila isi semua butiran dibawah *</font></b></p><br>

            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['style' => 'text-align:center']) ?>

                <?= $form->field($model, 'email')->textInput(['style' => 'text-align:center']) ?>

                <?= $form->field($model, 'password')->passwordInput(['style' => 'text-align:center']) ?>
            
                <?= $form->field($model, 'role_id')->textInput(['value'=>1, 'style' => 'text-align:center', 'readonly' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('H A N T A R', ['class' => 'btn btn-lg  btn-block', 'style' => 'background-color:#1E1E1E; color:white;', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
