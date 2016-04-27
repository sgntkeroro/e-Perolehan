<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblStatmohon */

$this->title = 'Create Tbl Statmohon';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Statmohons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-statmohon-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
