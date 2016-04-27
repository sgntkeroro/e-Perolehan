<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblCspi */

$this->title = 'Kemaskini Profil : ' . $model->cspi_id;
$this->params['breadcrumbs'][] = ['label' => 'Profil Dekan', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Kemaskini';
?>
<div class="tbl-cspi-update">

	<div class="btn-group btn-group-justified" role="group" aria-label="...">
	    <div class="btn-group" role="group">
	        <?= Html::a('<span class="glyphicon glyphicon-home" aria-hidden="true"> HOME</span>', ['//site/index'], ['class' => 'btn btn-info']) ?>
	    </div>
	    <div class="btn-group" role="group">
	        <?= Html::a('<span class="glyphicon glyphicon-envelope" aria-hidden="true"> PENGESAHAN PERMOHONAN</span>', ['//tbl-mesyuaratpermohonan/index'], ['class' => 'btn btn-primary']) ?>
	    </div>
	    <div class="btn-group" role="group">
	        <?= Html::a('<span class="glyphicon glyphicon-user" aria-hidden="true"> PROFIL PENGGUNA</span>', ['//tbl-cspi/index'], ['class' => 'btn btn-info']) ?>
	    </div>
	</div><br><br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
