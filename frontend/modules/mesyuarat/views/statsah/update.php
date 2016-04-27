<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\mesyuarat\models\Statsah */

$this->title = 'Update Statsah: ' . $model->statSah_id;
$this->params['breadcrumbs'][] = ['label' => 'Statsahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->statSah_id, 'url' => ['view', 'id' => $model->statSah_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="statsah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
