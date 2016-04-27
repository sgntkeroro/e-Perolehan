<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblBukulog */

$this->title = 'Create Tbl Bukulog';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Bukulogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-bukulog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
