<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblSuratpengesahanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Senarai Permohonan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-suratpengesahan-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'suratSah_id',
            'permohonan_id',
            'suratSah_path',
            'suratSah_type',
            'suratSah_size',
            // 'suratSah_nama',
            // 'suratSah_tarikh',
            // 'suratSah_deskripsi',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
