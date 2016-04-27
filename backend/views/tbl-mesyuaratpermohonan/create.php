<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblMesyuaratpermohonan */

$this->title = 'Create Tbl Mesyuaratpermohonan';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Mesyuaratpermohonans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-mesyuaratpermohonan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
