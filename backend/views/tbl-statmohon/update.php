<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblStatmohon */

$this->title = 'Update Tbl Statmohon: ' . $model->statMohon_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Statmohons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->statMohon_id, 'url' => ['view', 'id' => $model->statMohon_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-statmohon-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
