<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblMesyuaratperalatan */

$this->title = 'Update Tbl Mesyuaratperalatan: ' . $model->mesy_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Mesyuaratperalatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mesy_id, 'url' => ['view', 'id' => $model->mesy_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-mesyuaratperalatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
