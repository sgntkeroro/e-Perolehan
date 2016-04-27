<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\TblMesyuaratpermohonan */

$this->title = 'Mesyuarat Permohonan';
$this->params['breadcrumbs'][] = ['label' => 'Senarai Permohonan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-mesyuaratpermohonan-create">

    <?= $this->render('_form', [
        'model' => $model,
        'modelsAlatmesyuarat' => $modelsAlatmesyuarat,
    ]) ?>

</div>
