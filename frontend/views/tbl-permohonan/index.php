<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\db\Query;
use yii\db\Command;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;

use frontend\models\TblStatmohon;
use frontend\models\TblStatus;
use frontend\models\TblPermohonan;

$this->title = 'Senarai Permohonan';

$permohonan = TblPermohonan::find()->where(['user_id' => Yii::$app->user->identity->id])->andWhere(['status_id' => 2])->all();

// $moderator = TblModerator::find()->where(['user_id' => Yii::$app->user->identity->id])->one();
// $bm = TblBhgnmod::find()->where(['bm_id' => $moderator->bm_id])->one();
// $bhgn = TblBahagian::find()->where(['bahagian_id' => $bm->bahagian_id])->one();
// $unit = TblUnit::find()->where(['unit_id' => $bm->unit_id])->one();
$nombor = 1;
?>

<div class="tbl-permohonan-index" >
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class = "panel panel-primary">
        <div class = "panel-heading" style = "text-align:center">
            <?= Html::a('<span class="glyphicon glyphicon-home" aria-hidden="true"></span>', ['/site/index'], [
                'class' => 'btn btn-info',
                'data-toggle'=>'tooltip', 
                'title'=>'HOME'
            ]); ?>
        </div>
        <div class = "panel-body" align="center">
            <br>
            <p style = "text-align:center"><h4><b>SENARAI PERMOHONAN YANG AKTIF</b></h4></p>
            <br>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    'permohonan_id',
                    [
                        'label' => 'Tarikh',
                        'attribute' => 'permohonan_tarikh',
                        'value' => 'permohonan_tarikh',
                        'format' => 'raw',
                        'filter' => DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'permohonan_tarikh',
                            'options' => ['placeholder' => 'pilih tarikh permohonan'],
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'autoclose'=>true
                            ]
                        ]),
                    ],
                    //'permohonan_tarikh',
                    'permohonan_pusatKos',
                    [
                        'label' => 'Status Permohonan',
                        'attribute' => 'statMohon_id',
                        'value' => 'statMohon.statMohon_status',
                        'filter' => Html::activeDropDownList($searchModel, 'statMohon_id', ArrayHelper::map(TblStatmohon::find()->asArray()->all(), 'statMohon_id', 'statMohon_status'),['class'=>'form-control','prompt' => 'Sila Pilih']),
                    ],
                    [
                        'label' => 'Status',
                        'attribute' => 'status_id',
                        'value' => 'status.status_status',
                        'filter' => Html::activeDropDownList($searchModel, 'status_id', ArrayHelper::map(TblStatus::find()->asArray()->all(), 'status_id', 'status_status'),['class'=>'form-control','prompt' => 'Sila Pilih']),
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>

            <hr>
            <br>
            <p style = "text-align:center"><h4><b>SENARAI PERMOHONAN YANG SELESAI (TIDAK AKTIF)</b></h4></p>
            <br><br>

            <table class = "table table-bordered table-hover">
                <thead style = "background-color:grey">
                    <th>Bil.</th>
                    <th>Permohonan ID</th>
                    <th>Tarikh</th>
                    <th>Pusat Kos</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php $nombor = $nombor; foreach ($permohonan as $permohonan): ?>
                    <tr>
                        <td><?= $nombor++ ?></td>
                        <td><?= $permohonan['permohonan_id'] ?></td>
                        <td><?= $permohonan['permohonan_tarikh'] ?></td>
                        <td><?= $permohonan['permohonan_pusatKos'] ?></td>
                        <td style = "text-align:center">
                            <?= Html::a('<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>', 
                            ['viewselesai', 'id' => $permohonan->permohonan_id]) ?>
                    </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    
</div>
