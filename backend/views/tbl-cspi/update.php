<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblCspi */

$this->title = 'Update Tbl Cspi: ' . $model->cspi_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Cspis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cspi_id, 'url' => ['view', 'id' => $model->cspi_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-cspi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
