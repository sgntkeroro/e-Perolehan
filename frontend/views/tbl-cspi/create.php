<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\TblCspi */

$this->title = 'Profil CSPI';
$this->params['breadcrumbs'][] = ['label' => 'Profil CSPI', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-cspi-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
