<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblUnitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Units';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-unit-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Unit', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'unit_id',
            'unit_nama',
            'bahagian_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
