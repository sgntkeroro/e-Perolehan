<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblMesyuaratperalatan */

$this->title = 'Create Tbl Mesyuaratperalatan';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Mesyuaratperalatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-mesyuaratperalatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
