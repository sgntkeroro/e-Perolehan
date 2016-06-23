<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\mesyuarat\models\TahunSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tahuns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tahun-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tahun', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tahun_id',
            'tahun_tahun',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
