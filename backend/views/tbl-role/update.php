<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblRole */

$this->title = 'Update Tbl Role: ' . $model->role_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->role_id, 'url' => ['view', 'id' => $model->role_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-role-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
