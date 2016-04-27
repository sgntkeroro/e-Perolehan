<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblBhgnmodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Bhgnmods';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-bhgnmod-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Bhgnmod', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bm_id',
            'bahagian_id',
            'unit_id',
            'unitKC_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
