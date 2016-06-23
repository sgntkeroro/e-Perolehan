<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblJenisperuntukanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Jenisperuntukans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-jenisperuntukan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Jenisperuntukan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'jen_id',
            'jen_nama',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
