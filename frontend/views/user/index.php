<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\grid\ActionColumn;

use frontend\models\TblRole;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
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
        <br>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'id',
                'username',
                // 'auth_key',
                // 'password_hash',
                // 'password_reset_token',
                'email:email',
                // 'status',
                // 'created_at',
                // 'updated_at',
                // 'role_id',
                [
                    'label' => 'Role',
                    'attribute' => 'role_id',
                    'value' => 'role.role_name',
                    'filter' => Html::activeDropDownList($searchModel, 'role_id', ArrayHelper::map(TblRole::find()->asArray()->all(), 'role_id', 'role_name'),['class'=>'form-control','prompt' => 'Sila Pilih']),
                ], 

                // ['class' => 'yii\grid\ActionColumn'],
                ['class' => ActionColumn::className(),'template'=>'{update} {delete}' ],
            ],
        ]); ?>
    </div>    
</div>
