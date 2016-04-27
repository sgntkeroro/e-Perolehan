<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblDekan */

$this->title = 'Kemaskini Profil Dekan: ' . $model->dekan_id;
$this->params['breadcrumbs'][] = ['label' => 'Profil', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Kemaskini Profil Dekan';
?>
<div class="tbl-dekan-update">

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

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
