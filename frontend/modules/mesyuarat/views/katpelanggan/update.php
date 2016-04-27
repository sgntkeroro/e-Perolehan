<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\mesyuarat\models\Katpelanggan */

$this->title = 'Update Katpelanggan: ' . $model->pelanggan_id;
$this->params['breadcrumbs'][] = ['label' => 'Katpelanggans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pelanggan_id, 'url' => ['view', 'id' => $model->pelanggan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="katpelanggan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
