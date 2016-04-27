<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblModerator */

$this->title = 'Create Tbl Moderator';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Moderators', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-moderator-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
