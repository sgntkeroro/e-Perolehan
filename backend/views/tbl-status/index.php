<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Statuses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-status-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Status', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'status_id',
            'status_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
