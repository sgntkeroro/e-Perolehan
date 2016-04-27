<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblUnitkc */

$this->title = 'Update Tbl Unitkc: ' . $model->ukc_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Unitkcs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ukc_id, 'url' => ['view', 'id' => $model->ukc_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-unitkc-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
