<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblSysop */

$this->title = 'Update Tbl Sysop: ' . $model->sys_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Sysops', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sys_id, 'url' => ['view', 'id' => $model->sys_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-sysop-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
