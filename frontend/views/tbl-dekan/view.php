<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblDekan */

$this->title = $model->dekan_id;
$this->params['breadcrumbs'][] = ['label' => 'Profil Dekan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-dekan-view">

    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <?= Html::a('<span class="glyphicon glyphicon-home" aria-hidden="true"> HOME</span>', ['//site/index'], ['class' => 'btn btn-info']) ?>
        </div>
        <div class="btn-group" role="group">
            <?= Html::a('<span class="glyphicon glyphicon-envelope" aria-hidden="true"> PENGESAHAN PERMOHONAN</span>', ['//tbl-pengesahan/index'], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="btn-group" role="group">
            <?= Html::a('<span class="glyphicon glyphicon-user" aria-hidden="true"> PROFIL PENGGUNA</span>', ['//tbl-dekan/index'], ['class' => 'btn btn-info']) ?>
        </div>
    </div><br><br>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->dekan_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->dekan_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'dekan_id',
            'user_id',
            'dekan_nama',
            'dekan_tel',
            'dekan_pekerjaNo',
        ],
    ]) ?>

</div>
