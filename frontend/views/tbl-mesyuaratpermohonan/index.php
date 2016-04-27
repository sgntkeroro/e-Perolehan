<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblMesyuaratpermohonanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Senarai Permohonan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-mesyuaratpermohonan-index">

    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <?= Html::a('<span class="glyphicon glyphicon-home" aria-hidden="true"> HOME</span>', ['//site/index'], ['class' => 'btn btn-info']) ?>
        </div>
        <div class="btn-group" role="group">
            <?= Html::a('<span class="glyphicon glyphicon-envelope" aria-hidden="true"> PENGESAHAN PERMOHONAN</span>', ['//tbl-mesyuaratpermohonan/index'], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="btn-group" role="group">
            <?= Html::a('<span class="glyphicon glyphicon-user" aria-hidden="true"> PROFIL PENGGUNA</span>', ['//tbl-cspi/index'], ['class' => 'btn btn-info']) ?>
        </div>
    </div><br><br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [

            // 'mesyPerm_id',
            'permohonan_id',
            'mesyPerm_tarikh',
            [
                'label' => 'Status Mesyuarat',
                'attribute' => 'statMesyua_id',
                'value' => 'statMesyua.statMesyua_status',
            ],
            'mesyPerm_catitan',

            ['class' => ActionColumn::className(),'template'=>'{view} {update}' ],

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
