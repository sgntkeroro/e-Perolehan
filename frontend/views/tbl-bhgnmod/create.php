<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\TblBhgnmod */

$this->title = 'Create Tbl Bhgnmod';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Bhgnmods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-bhgnmod-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
