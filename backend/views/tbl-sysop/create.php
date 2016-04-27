<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblSysop */

$this->title = 'Create Tbl Sysop';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Sysops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-sysop-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
