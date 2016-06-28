<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblSokongan */

$this->title = 'Update Tbl Sokongan: ' . $model->sok_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Sokongans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sok_id, 'url' => ['view', 'id' => $model->sok_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-sokongan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
