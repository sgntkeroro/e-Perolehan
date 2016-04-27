<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblKatpermohonan */

$this->title = 'Update Tbl Katpermohonan: ' . $model->katPermohonan_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Katpermohonans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->katPermohonan_id, 'url' => ['view', 'id' => $model->katPermohonan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-katpermohonan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
