<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblTahun */

$this->title = 'Update Tbl Tahun: ' . $model->tahun_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Tahuns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tahun_id, 'url' => ['view', 'id' => $model->tahun_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-tahun-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
