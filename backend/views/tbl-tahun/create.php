<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblTahun */

$this->title = 'Create Tbl Tahun';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Tahuns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-tahun-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
