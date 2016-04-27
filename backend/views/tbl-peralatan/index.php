<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblPeralatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Peralatans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-peralatan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Peralatan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'alat_id',
            'permohonan_id',
            'alat_nama',
            'alat_kodAkaun',
            'alat_kuantiti',
            // 'alat_hargaUnit',
            // 'alat_jumlahHarga',
            // 'jk_id',
            // 'katPelanggan_id',
            // 'alat_tujuan',
            // 'katPermohonan_id',
            // 'alat_jenisPeruntukan',
            // 'alat_programBaru',
            // 'alat_tahap',
            // 'tahunSedia_id',
            // 'alat_pegawai',
            // 'alat_jawatan',
            // 'alat_lokasi',
            // 'alat_bukuLog',
            // 'bukuLog_id',
            // 'deleteBukuLog',
            // 'sort_order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
