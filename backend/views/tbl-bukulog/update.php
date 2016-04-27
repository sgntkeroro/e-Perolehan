<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblBukulog */

$this->title = 'Update Tbl Bukulog: ' . $model->bukulog_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Bukulogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bukulog_id, 'url' => ['view', 'id' => $model->bukulog_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-bukulog-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
