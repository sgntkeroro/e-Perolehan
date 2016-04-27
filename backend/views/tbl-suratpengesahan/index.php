<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblSuratpengesahanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Suratpengesahans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-suratpengesahan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Suratpengesahan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
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
