<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use kartik\date\DatePicker;

use frontend\models\TblStatmesyua;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblMesyuaratpermohonanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Senarai Permohonan';
?>
<div class="tbl-mesyuaratpermohonan-index" style = "text-align:center">
    <div class = "panel panel-primary">
        <div class = "panel-heading">
            <?= Html::a('<span class="glyphicon glyphicon-home" aria-hidden="true"></span>', ['/site/index'], [
                'class' => 'btn btn-info',
                'data-toggle'=>'tooltip', 
                'title'=>'HOME'
            ]); ?>
        </div>
        <div class = "panel-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'columns' => [
                   ['class' => 'yii\grid\SerialColumn'],

                   'permohonan_id',
                   'id',
                   'bm_id',
                   'unit_kampuscawangan',
                   'bahagian_nama',
                   'unit_nama',
                   //~ ['class' => 'yii\grid\ActionColumn'],
               ],
           ]); ?>
        </div>
    </div>
</div>
