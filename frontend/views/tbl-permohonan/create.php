<?php
use yii\helpers\Html;
use frontend\models\TblModerator;
use frontend\models\TblBhgnmod;
use frontend\models\TblBahagian;
use frontend\models\TblUnit;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPermohonan */
$this->title = 'Permohonan Baru';
$this->params['breadcrumbs'][] = ['label' => 'Senarai Permohonan', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Permohonan Baru';

$moderator = TblModerator::find()->where(['user_id' => Yii::$app->user->identity->id])->one();
$bm = TblBhgnmod::find()->where(['bm_id' => $moderator->bm_id])->one();
$bhgn = TblBahagian::find()->where(['bahagian_id' => $bm->bahagian_id])->one();
$unit = TblUnit::find()->where(['unit_id' => $bm->unit_id])->one();
?>

<style type="text/css">
    .span { 
    display:inline-block;
    width: 500px;
    }       
</style>

<div class="tbl-permohonan-create" style = "text-align:center">
    <div class="alert alert-success span" role="alert">
        <b><?= Html::tag('span', 'Permohonan ini dibuat oleh '.$moderator->mod_nama.'<br>mewakili'); ?></b><br><br>
        
        <font color="black">
            <?= $bhgn->bahagian_nama ?>,
            <?= $unit->unit_nama ?>,
            <?= $bm->unit_kampuscawangan ?>.
        </font>
    </div>
</div>
    <?= $this->render('_form', [
        'model' => $model,
        'modelsPeralatan' => $modelsPeralatan,        
        'modelsMesyuaratpermohonan' => $modelsMesyuaratpermohonan,
        'modelsMesyuarat' => $modelsMesyuarat,
        'modelsSuratpengesahan' => $modelsSuratpengesahan,
        'modelsPengesahan' => $modelsPengesahan,
    ]) ?>
