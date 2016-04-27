<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\TblPermohonan */

$this->params['breadcrumbs'][] = ['label' => 'Tbl Permohonans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-permohonan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsPeralatan' => $modelsPeralatan,        
        'modelsMesyuaratpermohonan' => $modelsMesyuaratpermohonan,
        'modelsSuratpengesahan' => $modelsSuratpengesahan,
        'modelsPengesahan' => $modelsPengesahan,
    ]) ?>

</div>
