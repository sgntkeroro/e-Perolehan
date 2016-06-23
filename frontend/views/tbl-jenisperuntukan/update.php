<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblJenisperuntukan */

$this->title = 'Update Tbl Jenisperuntukan: ' . $model->jen_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Jenisperuntukans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jen_id, 'url' => ['view', 'id' => $model->jen_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-jenisperuntukan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
