<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use kartik\date\DatePicker;

use frontend\models\TblStatmesyua;
use frontend\models\TblBhgnmod;
use frontend\models\TblBahagian;
use frontend\models\TblUnit;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblMesyuaratpermohonanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Senarai Permohonan';
?>
<div class="tbl-mesyuaratpermohonan-index">
    <div class = "panel panel-primary table-responsive">
        <div class = "panel-heading" style = "text-align:center">
            <?= Html::a('<span class="glyphicon glyphicon-home" aria-hidden="true"></span>', ['/site/index'], [
                'class' => 'btn btn-info',
                'data-toggle'=>'tooltip', 
                'title'=>'HOME'
            ]); ?>
        </div>
        <div class = "panel-body">
            <br><br>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // filterModel must be set to render filter cells within GridView
                'filterModel' => true,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        // specify attribute to display
                        'attribute' => 'permohonan_id',
                        // filter attribute accepts HTML to render
                        // in this case an input field of type string, with a name of 'pid'
                        'filter' => Html::input('string', 'permohonan_id')
                    ],
                    // [
                    //     'attribute' => 'id',
                    //     'filter' => Html::input('string', 'id')
                    // ],
                    // [
                    //     'attribute' => 'bm_id',
                    //     'filter' => Html::input('string', 'bm_id')
                    // ],
                    [
                        'attribute' => 'unit_kampuscawangan',
                        'filter' => Html::input('string', 'unit_kampuscawangan')
                        // 'filter' => Html::dropDownList(ArrayHelper::map(TblBhgnmod::find()->all(),'unit_kampuscawangan','unit_kampuscawangan')),
                    ],
                    [
                        'attribute' => 'bahagian_nama',
                        'filter' => Html::input('string', 'bahagian_nama')
                        // 'filter' => Html::dropDownList(ArrayHelper::map(TblBahagian::find()->all(),'bahagian_id','bahagian_nama')),
                    ],
                    [
                        'attribute' => 'unit_nama',
                        'filter' => Html::input('string', 'unit_nama')
                        // 'filter' => Html::dropDownList(TblUnit::find()->all(), ['prompt' => '--- select ---'])
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
