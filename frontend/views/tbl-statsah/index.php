<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblStatsahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Statsahs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-statsah-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Statsah', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'statSah_id',
            'statSah_nama',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
