<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblDekan */

$this->title = 'Update Tbl Dekan: ' . $model->dekan_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Dekans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dekan_id, 'url' => ['view', 'id' => $model->dekan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-dekan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
