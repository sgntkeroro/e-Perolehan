<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblDekan */

$this->title = 'Create Tbl Dekan';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Dekans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-dekan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
