<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\mesyuarat\models\Katpelanggan */

$this->title = $model->pelanggan_id;
$this->params['breadcrumbs'][] = ['label' => 'Katpelanggans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="katpelanggan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pelanggan_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pelanggan_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pelanggan_id',
            'pelanggan_nama',
        ],
    ]) ?>

</div>