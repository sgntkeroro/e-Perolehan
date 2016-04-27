<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblBahagianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Bahagians';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-bahagian-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Bahagian', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bahagian_id',
            'bahagian_nama',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
