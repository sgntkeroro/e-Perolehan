<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblDekanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profil Dekan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-dekan-index">

    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <?= Html::a('<span class="glyphicon glyphicon-home" aria-hidden="true"> HOME</span>', ['//site/index'], ['class' => 'btn btn-info']) ?>
        </div>
        <div class="btn-group" role="group">
            <?= Html::a('<span class="glyphicon glyphicon-envelope" aria-hidden="true"> PENGESAHAN PERMOHONAN</span>', ['//tbl-pengesahan/index'], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="btn-group" role="group">
            <?= Html::a('<span class="glyphicon glyphicon-user" aria-hidden="true"> PROFIL PENGGUNA</span>', ['//tbl-dekan/index'], ['class' => 'btn btn-info']) ?>
        </div>
    </div><br><br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary'=>"",
        'columns' => [
            // 'dekan_id',
            // 'user_id',
            [
                'label' => 'Username',
                'attribute' => 'user_id',
                'value' => 'user.username',
            ],
            'dekan_nama',
            'dekan_tel',
            'dekan_pekerjaNo',

            ['class' => ActionColumn::className(),'template'=>'{update}' ],

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
