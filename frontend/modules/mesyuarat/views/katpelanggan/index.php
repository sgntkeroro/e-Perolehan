<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\mesyuarat\models\KatpelangganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Katpelanggans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="katpelanggan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Katpelanggan', ['create'], ['class' => 'btn btn-success']) ?>
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
