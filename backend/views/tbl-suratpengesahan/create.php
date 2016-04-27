<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblSuratpengesahan */

$this->title = 'Create Tbl Suratpengesahan';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Suratpengesahans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-suratpengesahan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
