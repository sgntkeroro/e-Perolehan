<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblSokonganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Sokongans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-sokongan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Sokongan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sok_id',
            'sok_sokongan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
