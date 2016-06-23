<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\TblEmail */

$this->title = 'Email';
?>
<div class="tbl-email-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
