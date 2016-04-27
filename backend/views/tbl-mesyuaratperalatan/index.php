<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblMesyuaratperalatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Mesyuaratperalatans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-mesyuaratperalatan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Mesyuaratperalatan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mesy_id',
            'alat_id',
            'mesy_kuantiti',
            'mesy_jumlahHarga',
            'mesy_catitan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
