<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblSuratpengesahan */

$this->title = 'Update Tbl Suratpengesahan: ' . $model->suratSah_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Suratpengesahans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->suratSah_id, 'url' => ['view', 'id' => $model->suratSah_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-suratpengesahan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
