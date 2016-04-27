<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblUnit */

$this->title = 'Update Tbl Unit: ' . $model->unit_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Units', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->unit_id, 'url' => ['view', 'id' => $model->unit_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-unit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
