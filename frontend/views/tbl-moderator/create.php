<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\TblModerator */

$this->title = 'Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-moderator-create">

    <?= $this->render('_form', [
        'model' => $model,
        'modelsBahagian' => $modelsBahagian,
    ]) ?>

</div>
