<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblBahagian */

$this->title = 'Create Tbl Bahagian';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Bahagians', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-bahagian-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
