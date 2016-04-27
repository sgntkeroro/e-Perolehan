<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\mesyuarat\models\Bahagian */

$this->title = 'Create Bahagian';
$this->params['breadcrumbs'][] = ['label' => 'Bahagians', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bahagian-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
