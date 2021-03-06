<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPeralatan */

$this->title = $model->alat_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Peralatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-peralatan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->alat_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->alat_id], [
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
            'alat_id',
            'permohonan_id',
            'alat_nama',
            'alat_kodAkaun',
            'alat_kuantiti',
            'alat_hargaUnit',
            'alat_jumlahHarga',
            'jk_id',
            'katPelanggan_id',
            'alat_tujuan',
            'katPermohonan_id',
            'alat_jenisPeruntukan',
            'alat_programBaru',
            'alat_tahap',
            'tahunSedia_id',
            'alat_pegawai',
            'alat_jawatan',
            'alat_lokasi',
            'alat_bukuLog',
            'bukuLog_id',
            'deleteBukuLog',
            'sort_order',
        ],
    ]) ?>

</div>
