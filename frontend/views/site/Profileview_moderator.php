<?php
use yii\helpers\Html;
use yii\web\JsExpression;

/* @var $this yii\web\View */

$this->title = 'Profile';
?>

<style type="text/css">
	.div {
    width: 800px;
    height: 400px;

    position: absolute;
    top:0;
    bottom: 0;
    left: 0;
    right: 0;

    margin: auto;
}
</style>

<div class = "panel panel-primary col-lg-8 div">
    <div class = "panel-body" style = "text-align:center"><br><br>
    	<h4><b>Selamat Datang ke sistem e-Perolehan.</b><br><br><br>
    		Anda telah mendaftar sebagai <i><b>moderator</b></i>.<br> 
    		Sila isi butiran diri anda terlebih dahulu sebelum memulakan akses lain.</h4><br>
        <?= Html::a('<h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span></h3>', ['/tbl-moderator/create'], [
            'class' => 'btn btn-primary',
            'data-toggle'=>'tooltip', 
            'title'=>'Butiran Diri'
        ]); ?><br><br>
        Sekiranya anda bukan <b><i>moderator</i></b>, 
        sila <b>lengkapkan butiran</b> anda terlebih dahulu dengan menekan butang diatas 
        kemudian berhubung dengan pihak <b>CSPI</b> untuk menukar <b><i>Role</i></b> anda
    </div>
</div>