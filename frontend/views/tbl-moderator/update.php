<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblModerator */

$this->title = 'Kemaskini Profil ';
$this->params['breadcrumbs'][] = ['label' => 'Profil', 'url' => ['view', 'id' => $model->mod_id]];
$this->params['breadcrumbs'][] = 'Kemaskini';
?>
<div class="tbl-moderator-update">

    <?= $this->render('_form', [
        'model' => $model,
        'modelsBahagian' => $modelsBahagian,
    ]) ?>

</div>
