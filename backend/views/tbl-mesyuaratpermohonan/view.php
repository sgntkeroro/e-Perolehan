<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TblMesyuaratpermohonan */

$this->title = $model->mesyPerm_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Mesyuaratpermohonans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-mesyuaratpermohonan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mesyPerm_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mesyPerm_id], [
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
            'mesyPerm_id',
            'permohonan_id',
            'statMesyua_id',
            'mesyPerm_tarikh',
            'mesyPerm_catitan',
        ],
    ]) ?>

</div>
