<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblPeralatan */

$this->title = 'Create Tbl Peralatan';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Peralatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-peralatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
