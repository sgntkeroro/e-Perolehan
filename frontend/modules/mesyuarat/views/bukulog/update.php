<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\mesyuarat\models\Bukulog */

$this->title = 'Update Bukulog: ' . $model->bukulog_id;
$this->params['breadcrumbs'][] = ['label' => 'Bukulogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bukulog_id, 'url' => ['view', 'id' => $model->bukulog_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bukulog-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
