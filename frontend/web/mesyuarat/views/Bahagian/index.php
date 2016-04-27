<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\mesyuarat\models\BahagianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bahagians';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bahagian-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bahagian', ['create'], ['class' => 'btn btn-success']) ?>
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
