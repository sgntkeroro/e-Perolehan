<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblStatmesyuaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Statmesyuas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-statmesyua-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Statmesyua', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'statMesyua_id',
            'statMesyua_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
