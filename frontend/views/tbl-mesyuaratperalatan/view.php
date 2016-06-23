<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblMesyuaratperalatan */

$this->title = $model->mesy_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Mesyuaratperalatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-mesyuaratperalatan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mesy_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mesy_id], [
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
            'mesy_id',
            'mesyPerm_id',
            'alat_id',
            'mesy_kuantiti',
            'mesy_jumlahHarga',
            'mesy_catitan',
        ],
    ]) ?>

</div>
