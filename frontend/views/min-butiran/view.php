<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\MinButiran */

$this->title = $model->minit_bil;
$this->params['breadcrumbs'][] = ['label' => 'Senarai Minit Mesyuarat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="min-butiran-view">

    <div class="panel panel-primary">
        <div class="panel-heading"><b>Butiran Mesyuarat</b></div>
        <div class="panel-body">
            <table class = "table">
                <thead>
                    <th>Bil.</th>
                    <th>Tarikh</th>
                    <th>Masa</th>
                    <th>Tempat</th>
                    <th style = "text-align:right;">
                        <?= Html::a('<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('<span class="glyphicon glyphicon-user" aria-hidden="true"></span>', ['updatekehadiran', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                        <?= Html::a('<span class="glyphicon glyphicon-file" aria-hidden="true"></span>', ['pdf', 'id' => $model->id], [
                            'class' => 'btn btn-info',
                            'target'=>'_blank', 
                            'data-toggle'=>'tooltip', 
                            'title'=>'Will open the generated PDF file in a new window'
                        ]); ?>
                    </th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?= $model->minit_bil ?>
                        </td>
                        <td>
                            <?= $model->minit_tarikh ?>
                        </td>
                        <td>
                            <?= $model->minit_masa ?>
                        </td>
                        <td>
                            <?= nl2br($model->minit_tempat)?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr><br>
            <p style = "text-align:right;">
                <?= Html::a('<span class="glyphicon glyphicon-user" aria-hidden="true"></span>', 
                    ['updatekehadiran', 
                    'id' => $model->id], 
                    ['class' => 'btn btn-primary'
                ]) ?>
            </p>
            <table class = "table table-hover">
                <thead>
                    <th>KEHADIRAN</th>
                    <th></th>
                    <th style = "text-align:right;">
                    </th>
                </thead>
                <tbody>
                    <?php $nombor = $nombor; foreach ($modelsHadir as $modelsHadir): ?>                                
                    <tr>
                        <td>
                            <?= $nombor++; ?>
                        </td>
                        <td>
                            <?= nl2br($modelsHadir['hadir_nama']) ?><br>
                            <?= nl2br($modelsHadir['hadir_jawatan']) ?>
                        </td>
                        <td>
                            <?= nl2br($modelsHadir['hadir_peranan']) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <hr><br>
            <p style = "text-align:right;">
                <?= Html::a('<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            </p>
            <table class = "table table-bordered">
                <thead>
                    <th>BIL</th>
                    <th>PERKARA</th>
                    <th>
                        TINDAKAN / MAKLUMAT
                    </th>
                </thead>
                <tbody>
                    <?php foreach ($modelsPerkara as $modelsPerkara): ?>                                
                    <tr>
                        <td>
                            <?= nl2br($modelsPerkara['perkara_bil']) ?>
                        </td>
                        <td>
                            <?= nl2br($modelsPerkara['perkara_tajuk']) ?>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td style = "text-align:justify;">
                            <?= nl2br($modelsPerkara['perkara_isi']) ?>
                        </td>
                        <td>
                            <?= nl2br($modelsPerkara['perkara_maklumat']) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br>
            <table class = "table">
                <tbody>
                    <tr>
                        <?= nl2br($model->minit_notakaki)?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
