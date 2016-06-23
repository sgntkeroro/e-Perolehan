<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\db\Query;
use yii\db\Command;
use yii\bootstrap\Modal;
use yii\helpers\Url;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\JsonParser;
use yii\web\Response;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

use frontend\models\TblModerator;
use frontend\models\TblBhgnmod;
use frontend\models\TblBahagian;
use frontend\models\TblUnit;

use frontend\models\TblPermohonan;

/* @var $this yii\web\View */

$this->title = 'Pemohon';

$moderator = TblModerator::find()->where(['user_id' => Yii::$app->user->identity->id])->one();
$bm = TblBhgnmod::find()->where(['bm_id' => $moderator->bm_id])->one();
$bhgn = TblBahagian::find()->where(['bahagian_id' => $bm->bahagian_id])->one();
$unit = TblUnit::find()->where(['unit_id' => $bm->unit_id])->one();

$Permohonan = TblPermohonan::find()
->where(['user_id' => Yii::$app->user->identity->id])
->andWhere(['statMohon_id' => 1])
->all();
?>

<div class="panel panel-primary">
    <div class="panel-heading">        
        <h4 style = "text-align:center"><b><span class="glyphicon glyphicon-user" aria-hidden="true"></span></b></h4>
    </div>
    <div class="panel-body table-responsive">
        <br>
        <table class = "table">
            <thead>
                <th>Nama</th>
                <th>No. Tel.</th>
                <th>No. Pekerja</th>
                <th>Bahagian</th>
                <th>Unit / Kampus</th>
                <th>Jabatan (Kampus Cawangan)</th>
            </thead>
            <tbody>
                <tr>
                    <td><?= $moderator->mod_nama ?></td>
                    <td><?= $moderator->mod_tel ?></td>
                    <td><?= $moderator->mod_pekerjaNo ?></td>
                    <td><?= $bhgn->bahagian_nama ?></td>
                    <td><?= $unit->unit_nama ?></td>
                    <td><?= $bm->unit_kampuscawangan ?></td>
                </tr>
                </tbody>
        </table>
        <p style = "text-align:center"><br>
            <?= Html::a('K E M A S K I N I', ['/tbl-moderator/update', 'id' => $moderator->mod_id], ['class' => 'btn btn-lg btn-info']) ?>
        </p>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h4 style = "text-align:center"><b>P E R M O H O N A N</b></h4>
    </div>
    <div class="panel-body table-responsive">
        <p style = "text-align:center">
            <?= Html::a('<span class="glyphicon glyphicon-open-file" aria-hidden="true"></span>', ['/tbl-permohonan/create'], [
                'class' => 'btn btn-success',
                'data-toggle'=>'tooltip', 
                'title'=>'Permohonan Baru'
            ]); ?>

            <?= Html::a('<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>', 
                ['/tbl-permohonan/index'], [
                'class' => 'btn btn-warning',
                'data-toggle'=>'tooltip', 
                'title'=>'Senarai Permohonan'
            ]); ?>
        </p>
        <hr>
        <p><b><h4>Permohonan yang belum diproses.</h4></b></p><br>
        <table class = "table table-hover">
            <thead>
                <th>ID</th>
                <th>Tarikh</th>
                <th>Pusat Kos</th>
                <th style = "text-align:center"></th>
            </thead>
            <tbody>
                <?php foreach ($Permohonan as $Permohonan): ?>
                <tr>
                    <td class = "col-lg-2"><?= $Permohonan['permohonan_id'] ?></td>
                    <td class = "col-lg-2"><?= $Permohonan['permohonan_tarikh'] ?></td>
                    <td class = "col-lg-2"><?= $Permohonan['permohonan_pusatKos'] ?></td>
                    <td class = "col-lg-2" style = "text-align:center">
                        <?= Html::a('<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>', 
                        ['/tbl-permohonan/view', 'id' => $Permohonan->permohonan_id], 
                        ['class' => 'btn btn-sm btn-primary']) ?>

                        <?= Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', 
                        ['/tbl-permohonan/update', 'id' => $Permohonan->permohonan_id], 
                        ['class' => 'btn btn-sm btn-success']) ?>

                        <?= Html::a('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', 
                            ['/tbl-permohonan/delete', 'id' => $Permohonan['permohonan_id']], [
                            'class' => 'btn btn-sm btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table><br><br>
    </div>
</div>