<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblStatmesyua */

$this->title = 'Update Tbl Statmesyua: ' . $model->statMesyua_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Statmesyuas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->statMesyua_id, 'url' => ['view', 'id' => $model->statMesyua_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-statmesyua-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
