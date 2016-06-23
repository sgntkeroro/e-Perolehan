<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\MinButiranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Minit Mesyuarat';
?>
<div class="min-butiran-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class = "panel panel-primary">
        <div class = "panel-heading" style = "text-align:center">
            <?= Html::a('<span class="glyphicon glyphicon-home" aria-hidden="true"></span>', ['/site/index'], [
                'class' => 'btn btn-info',
                'data-toggle'=>'tooltip', 
                'title'=>'HOME'
            ]); ?>
        </div>
        <div class = "panel-body">
            <p style = "text-align:center">
                <?= Html::a('<span class="glyphicon glyphicon-open-file" aria-hidden="true"></span>', ['create'], [
                    'class' => 'btn btn-success',
                    'data-toggle'=>'tooltip', 
                    'title'=>'Minit Mesyuarat Baru'
                ]); ?>
            </p><br><br>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //'id',
                    'minit_bil',
                    'minit_tarikh',
                    'minit_masa',
                    'minit_tempat:ntext',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
