<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblSysopSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Sysops';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-sysop-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Sysop', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sys_id',
            'user_id',
            'sys_nama',
            'sys_tel',
            'sys_pekerjaNo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
