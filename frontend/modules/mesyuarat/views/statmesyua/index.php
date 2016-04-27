<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\mesyuarat\models\StatmesyuaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Statmesyuas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statmesyua-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Statmesyua', ['create'], ['class' => 'btn btn-success']) ?>
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
