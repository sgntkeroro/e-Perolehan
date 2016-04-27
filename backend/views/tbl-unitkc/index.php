<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblUnitkcSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Unitkcs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-unitkc-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Unitkc', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ukc_id',
            'ukc_unit',
            'unit_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
