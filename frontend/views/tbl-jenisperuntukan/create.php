<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\TblJenisperuntukan */

$this->title = 'Create Tbl Jenisperuntukan';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Jenisperuntukans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-jenisperuntukan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
