<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblCspi */

$this->title = 'Create Tbl Cspi';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Cspis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-cspi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
