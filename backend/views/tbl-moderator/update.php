<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblModerator */

$this->title = 'Update Tbl Moderator: ' . $model->mod_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Moderators', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mod_id, 'url' => ['view', 'id' => $model->mod_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-moderator-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
