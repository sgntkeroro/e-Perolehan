<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblEmail */

$this->title = $model->email_id;
?>
<div class="panel panel-primary">
    <div class = "panel-heading" style = "text-align:center">
        <?= Html::a('<span class="glyphicon glyphicon-home" aria-hidden="true"></span>', ['/site/index'], [
            'class' => 'btn btn-info',
            'data-toggle'=>'tooltip', 
            'title'=>'HOME'
        ]); ?>
    </div>
    <div class = "panel-body">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'email_id:email',
                'receiver_name',
                'receiver_email:email',
                'subject',
                'content:ntext',
                'attachment',
            ],
        ]) ?>
    </div>
</div>
