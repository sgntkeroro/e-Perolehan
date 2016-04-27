<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPermohonan */

$this->title = 'Update Tbl Permohonan: ' . $model->permohonan_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Permohonans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->permohonan_id, 'url' => ['view', 'id' => $model->permohonan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-permohonan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
