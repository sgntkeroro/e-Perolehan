<?php
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Profile';
$this->params['breadcrumbs'][] = $this->title;
?>

<div>
	<div class="btn-group btn-group-justified" role="group" aria-label="...">
	    <div class="btn-group" role="group">
	        <?= Html::a('<span class="glyphicon glyphicon-home" aria-hidden="true"> HOME</span>', ['//site/index'], ['class' => 'btn btn-info']) ?>
	    </div>
	    <div class="btn-group" role="group">
	        <?= Html::a('<span class="glyphicon glyphicon-envelope" aria-hidden="true"> PENGESAHAN PERMOHONAN</span>', ['//tbl-pengesahan/index'], ['class' => 'btn btn-primary']) ?>
	    </div>
	    <div class="btn-group" role="group">
	        <?= Html::a('<span class="glyphicon glyphicon-user" aria-hidden="true"> PROFIL PENGGUNA</span>', ['//tbl-dekan/index'], ['class' => 'btn btn-info']) ?>
	    </div>
	</div><br><br>
</div>