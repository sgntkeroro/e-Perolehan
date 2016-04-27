<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\mesyuarat\models\Statmesyua */

$this->title = 'Create Statmesyua';
$this->params['breadcrumbs'][] = ['label' => 'Statmesyuas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statmesyua-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
