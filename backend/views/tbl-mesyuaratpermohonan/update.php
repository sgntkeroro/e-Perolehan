<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblMesyuaratpermohonan */

$this->title = 'Update Tbl Mesyuaratpermohonan: ' . $model->mesyPerm_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Mesyuaratpermohonans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mesyPerm_id, 'url' => ['view', 'id' => $model->mesyPerm_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-mesyuaratpermohonan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
