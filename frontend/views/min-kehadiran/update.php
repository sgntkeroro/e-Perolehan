<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\MinKehadiran */

$this->title = 'Update Min Kehadiran: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Min Kehadirans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="min-kehadiran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
