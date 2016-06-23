<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>
<div class="site-login" align = "center">
    <div class="panel panel-default" style = "width:500px; text-align:center">
        <div class="panel-heading" style = "background-color:#1E1E1E;"><h3><b><font color = "white">Log Masuk</font></b></h3></div>
        <div class="panel-body">

            <p><b><font color = "crimson">* Sila isi semua butiran dibawah untuk log masuk *</font></b></p><br>

            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['style' => 'text-align:center']) ?>

                <?= $form->field($model, 'password')->passwordInput(['style' => 'text-align:center']) ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('H A N T A R', ['class' => 'btn btn-lg  btn-block', 'style' => 'background-color:#1E1E1E; color:white;', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
