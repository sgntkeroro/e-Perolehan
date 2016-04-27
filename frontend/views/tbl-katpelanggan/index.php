<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblKatpelangganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Katpelanggans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-katpelanggan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Katpelanggan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pelanggan_id',
            'pelanggan_nama',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
