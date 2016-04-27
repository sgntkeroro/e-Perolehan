<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblSuratpengesahan */

$this->title = $model->suratSah_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Suratpengesahans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-suratpengesahan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->suratSah_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->suratSah_id], [
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
            'suratSah_id',
            'permohonan_id',
            'suratSah_path',
            'suratSah_type',
            'suratSah_size',
            'suratSah_nama',
            'suratSah_tarikh',
            'suratSah_deskripsi',
        ],
    ]) ?>

</div>
