<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPermohonan */
$this->title = 'Permohonan Baru';
$this->params['breadcrumbs'][] = ['label' => 'Senarai Permohonan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-permohonan-create">

	<div class="btn-group btn-group-justified" role="group" aria-label="...">
    <div class="btn-group" role="group">
        <?= Html::a('<span class="glyphicon glyphicon-home" aria-hidden="true"> HOME</span>', ['//site/index'], ['class' => 'btn btn-info']) ?>
    </div>
    <div class="btn-group" role="group">
        <?= Html::a('<span class="glyphicon glyphicon-envelope" aria-hidden="true"> PERMOHONAN</span>', ['//tbl-permohonan/index'], ['class' => 'btn btn-primary']) ?>
    </div>
    <div class="btn-group" role="group">
        <?= Html::a('<span class="glyphicon glyphicon-user" aria-hidden="true"> PROFIL PENGGUNA</span>', ['//tbl-moderator/index'], ['class' => 'btn btn-info']) ?>
    </div>
</div><br><br>

	<br>
    <?= $this->render('_form', [
        'model' => $model,
        'modelsPeralatan' => $modelsPeralatan,        
        'modelsMesyuaratpermohonan' => $modelsMesyuaratpermohonan,
        'modelsMesyuarat' => $modelsMesyuarat,
        'modelsSuratpengesahan' => $modelsSuratpengesahan,
        'modelsPengesahan' => $modelsPengesahan,
    ]) ?>

</div>
