<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\MinKehadiran */

$this->title = 'Create Min Kehadiran';
$this->params['breadcrumbs'][] = ['label' => 'Min Kehadirans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="min-kehadiran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
