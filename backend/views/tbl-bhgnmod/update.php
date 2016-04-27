<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblBhgnmod */

$this->title = 'Update Tbl Bhgnmod: ' . $model->bm_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Bhgnmods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bm_id, 'url' => ['view', 'id' => $model->bm_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-bhgnmod-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
