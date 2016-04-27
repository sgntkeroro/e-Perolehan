<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\mesyuarat\models\Statmohon */

$this->title = 'Create Statmohon';
$this->params['breadcrumbs'][] = ['label' => 'Statmohons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statmohon-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
