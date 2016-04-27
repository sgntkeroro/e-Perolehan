<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblPermohonanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Permohonans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-permohonan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Permohonan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'permohonan_id',
            'user_id',
            'permohonan_tarikh',
            'permohonan_pusatKos',
            'statMohon_id',
            // 'dekan_id',
            // 'status_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
