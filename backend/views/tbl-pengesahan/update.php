<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPengesahan */

$this->title = 'Update Tbl Pengesahan: ' . $model->sah_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Pengesahans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sah_id, 'url' => ['view', 'id' => $model->sah_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-pengesahan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
