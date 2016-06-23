<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Person */

$this->title = 'Update Person: ' . $modelPerson->id;
$this->params['breadcrumbs'][] = ['label' => 'People', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $modelPerson->id, 'url' => ['view', 'id' => $modelPerson->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="person-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelPerson' => $modelPerson,
        'modelsHouse' => $modelsHouse,
        'modelsRoom' => $modelsRoom,
    ]) ?>

</div>
