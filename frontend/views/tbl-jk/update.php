<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblJk */

$this->title = 'Update Tbl Jk: ' . $model->jk_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Jks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jk_id, 'url' => ['view', 'id' => $model->jk_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-jk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
