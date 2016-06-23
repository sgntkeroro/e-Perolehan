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
                'filterModel' => $searchModel,
                'summary' => '',
                'columns' => [

                    // 'mesyPerm_id',
                    'permohonan_id',
                    // [
                    //     'label' => 'User ID',
                    //     'attribute' => 'permohonan.user_id',
                    //     'value' => 'permohonan.user_id',
                    //     // 'filter' => Html::activeDropDownList($searchModel, 'statMesyua_id', ArrayHelper::map(TblStatmesyua::find()->asArray()->all(), 'statMesyua_id', 'statMesyua_status'),['class'=>'form-control','prompt' => 'Sila Pilih']),
                    // ], 
                    [
                        'label' => 'Tarikh Mesyuarat',
                        'attribute' => 'mesyPerm_tarikh',
                        'value' => 'mesyPerm_tarikh',
                        'format' => 'raw',
                        'filter' => DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'mesyPerm_tarikh',
                            'options' => ['placeholder' => 'pilih tarikh mesyuarat'],
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'autoclose'=>true
                            ]
                        ]),
                    ],
                    [
                        'label' => 'Status Mesyuarat',
                        'attribute' => 'statMesyua_id',
                        'value' => 'statMesyua.statMesyua_status',
                        'filter' => Html::activeDropDownList($searchModel, 'statMesyua_id', ArrayHelper::map(TblStatmesyua::find()->asArray()->all(), 'statMesyua_id', 'statMesyua_status'),['class'=>'form-control','prompt' => 'Sila Pilih']),
                    ], 
                    'mesyPerm_catitan',

                    ['class' => ActionColumn::className(),'template'=>'{view} {update}' ],

                    // ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
