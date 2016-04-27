<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblJk */

$this->title = 'Create Tbl Jk';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Jks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-jk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
