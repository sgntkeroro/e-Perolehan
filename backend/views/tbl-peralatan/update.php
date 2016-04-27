<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPeralatan */

$this->title = 'Update Tbl Peralatan: ' . $model->alat_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Peralatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->alat_id, 'url' => ['view', 'id' => $model->alat_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-peralatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
