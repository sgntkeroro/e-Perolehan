<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\TblStatsah */

$this->title = 'Create Tbl Statsah';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Statsahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-statsah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
