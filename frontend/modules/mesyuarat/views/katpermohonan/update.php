<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\mesyuarat\models\Katpermohonan */

$this->title = 'Update Katpermohonan: ' . $model->katPermohonan_id;
$this->params['breadcrumbs'][] = ['label' => 'Katpermohonans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->katPermohonan_id, 'url' => ['view', 'id' => $model->katPermohonan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="katpermohonan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
