<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Permohonan */

$this->title = 'Kemaskini Status: ' . $model->permohonan_id;
?>
<div class="permohonan-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
