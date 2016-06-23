<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\MinButiran */

$this->title = 'Minit Mesyuarat';
$this->params['breadcrumbs'][] = ['label' => 'Senarai Minit Mesyuarat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="min-butiran-create">

    <?= $this->render('_form', [
        'model' => $model,
        'modelsPerkara' => $modelsPerkara,
    ]) ?>

</div>
