<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblCspiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profil CSPI';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-cspi-index">

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
        'summary' => '',
        'columns' => [

            // 'cspi_id',
            [
                'label' => 'Username',
                'attribute' => 'user_id',
                'value' => 'user.username',
            ],
            'cspi_nama',
            'cspi_tel',
            'cspi_pekerjaNo',

            ['class' => ActionColumn::className(),'template'=>'{update}' ],
        ],
    ]); ?>
</div>
