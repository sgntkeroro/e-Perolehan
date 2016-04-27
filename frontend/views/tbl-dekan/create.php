<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\TblDekan */

$this->title = 'Profil Dekan';
$this->params['breadcrumbs'][] = ['label' => 'Profil Dekan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-dekan-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
