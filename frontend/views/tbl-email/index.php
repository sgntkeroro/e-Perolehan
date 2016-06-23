<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblEmailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Emails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-email-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Email', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'email_id:email',
            'receiver_name',
            'receiver_email:email',
            'content:ntext',
            'attachment',
            // 'subject',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
