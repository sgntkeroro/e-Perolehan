<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use kartik\date\DatePicker;
use yii\grid\ActionColumn;

use frontend\models\TblKategori;
use frontend\models\TblSokongan;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PermohonanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Permohonans';
?>

<div class = "panel panel-primary">
    <div class = "panel-heading" style = "text-align:center">
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
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'permohonan_id',
                [
                    'label' => 'Kategori Permohonan',
                    'attribute' => 'kat_id',
                    'value' => 'kategori.kat_kategori',
                    'filter' => Html::activeDropDownList($searchModel, 'kat_id', 
                        ArrayHelper::map(TblKategori::find()->asArray()->all(), 'kat_id', 'kat_kategori'),
                        ['class'=>'form-control','prompt' => 'Sila Pilih']),
                ],
                [
                    'label' => 'Tarikh Permohonan',
                    'attribute' => 'permohonan_tarikh',
                    'value' => 'permohonan_tarikh',
                    'format' => 'raw',
                    'filter' => DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'permohonan_tarikh',
                        'options' => ['placeholder' => 'pilih tarikh'],
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd',
                            'autoclose'=>true
                        ]
                    ]),
                ],
                'permohonan_pusatKos',
                [
                    'label' => 'Status Sokongan',
                    'attribute' => 'sok_id',
                    'value' => 'sokongan.sok_sokongan',
                    'filter' => Html::activeDropDownList($searchModel, 'sok_id', 
                        ArrayHelper::map(TblSokongan::find()->asArray()->all(), 'sok_id', 'sok_sokongan'),
                        ['class'=>'form-control','prompt' => 'Sila Pilih']),
                ],

                ['class' => ActionColumn::className(),'template'=>'{view} {update}' ],
            ],
        ]); ?>
    </div>
</div>
