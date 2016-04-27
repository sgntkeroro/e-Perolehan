<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblCspiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Cspis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-cspi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Cspi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cspi_id',
            'user_id',
            'cspi_nama',
            'cspi_tel',
            'cspi_pekerjaNo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
