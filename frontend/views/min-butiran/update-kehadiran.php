<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\MinButiran */

$this->title = $model->minit_bil;
$this->params['breadcrumbs'][] = ['label' => 'Senarai Minit Mesyuarat', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->minit_bil, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Kemaskini Perkara';
?>
<div class="min-butiran-update">

    <?= $this->render('_form-kehadiran', [
        'model' => $model,
        'modelsHadir' => $modelsHadir,
    ]) ?>

</div>
