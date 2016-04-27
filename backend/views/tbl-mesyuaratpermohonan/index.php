<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblMesyuaratpermohonanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Mesyuaratpermohonans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-mesyuaratpermohonan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Mesyuaratpermohonan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mesyPerm_id',
            'permohonan_id',
            'statMesyua_id',
            'mesyPerm_tarikh',
            'mesyPerm_catitan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
