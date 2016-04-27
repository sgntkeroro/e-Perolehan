<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblDekanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Dekans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-dekan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Dekan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'dekan_id',
            'user_id',
            'dekan_nama',
            'dekan_tel',
            'dekan_pekerjaNo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
