<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblBukulogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Bukulogs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-bukulog-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Bukulog', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bukulog_id',
            'bukulog_path',
            'bukulog_type',
            'bukulog_size',
            'bukulog_nama',
            // 'sort_order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
