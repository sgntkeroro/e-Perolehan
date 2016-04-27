<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblModeratorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profil Moderator';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tbl-moderator-index">

    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <?= Html::a('<span class="glyphicon glyphicon-home" aria-hidden="true"> HOME</span>', ['//site/index'], ['class' => 'btn btn-info']) ?>
        </div>
        <div class="btn-group" role="group">
            <?= Html::a('<span class="glyphicon glyphicon-envelope" aria-hidden="true"> PERMOHONAN</span>', ['//tbl-permohonan/index'], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="btn-group" role="group">
            <?= Html::a('<span class="glyphicon glyphicon-user" aria-hidden="true"> PROFIL PENGGUNA</span>', ['//tbl-moderator/index'], ['class' => 'btn btn-info']) ?>
        </div>
    </div><br><br>

    <div>
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary'=>"",
        'columns' => [

            // 'mod_id',
            // 'user_id',
            'mod_nama',
            'mod_tel',
            'mod_pekerjaNo',
            // 'bm_id',

            ['class' => ActionColumn::className(),'template'=>'{view} {update}' ],
        ],
    ]); ?>
    </div>

    
</div>
