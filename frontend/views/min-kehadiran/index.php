<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\MinKehadiranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Min Kehadirans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="min-kehadiran-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Min Kehadiran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'min_id',
            'hadir_nama',
            'hadir_jawatan',
            'hadir_peranan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
