<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\db\Query;
use yii\db\Command;

    $query = new Query;
    $query ->select([
    'tbl_unit.unit_nama as unit'
    ])
    ->from('tbl_unit')
    ->innerJoin('tbl_bhgnmod','tbl_unit.unit_id=tbl_bhgnmod.unit_id')
    ->innerJoin('tbl_moderator','tbl_bhgnmod.bm_id=tbl_moderator.bm_id')
    ->where('tbl_unit.unit_id=tbl_bhgnmod.unit_id')
    ->andWhere('tbl_moderator.user_id= "'.Yii::$app->user->identity->id.'"'); 

    $command=$query->createCommand();
    $data=$command->queryAll();

$this->title = 'Senarai Permohonan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-permohonan-index" >
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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

    <p style="font-size:20px" align=center>
        <b>
            <br>Senarai Permohonan  
            <?php foreach ($data as $bahagian): ?>
                <?= $bahagian['unit'] ?>
            <?php endforeach; ?>
        </b>        
        <br><br><?= Html::a('Permohonan Baru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'permohonan_id',
            'permohonan_tarikh',
            'permohonan_pusatKos',
            [
                'label' => 'Status Permohonan',
                'attribute' => 'statMohon_id',
                'value' => 'statMohon.statMohon_status',
            ],
            [
                'label' => 'Dekan / PTJ',
                'attribute' => 'dekan_id',
                'value' => 'dekan.dekan_nama',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
