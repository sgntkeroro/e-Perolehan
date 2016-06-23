<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblEmail */

$this->title = 'Update Tbl Email: ' . $model->email_id;
?>
<div class="tbl-email-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
