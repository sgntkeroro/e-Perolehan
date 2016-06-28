<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblKategori */

$this->title = 'Update Tbl Kategori: ' . $model->kat_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Kategoris', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kat_id, 'url' => ['view', 'id' => $model->kat_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-kategori-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
