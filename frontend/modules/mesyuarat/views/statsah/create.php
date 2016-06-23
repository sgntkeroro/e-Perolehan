<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\mesyuarat\models\Statsah */

$this->title = 'Create Statsah';
$this->params['breadcrumbs'][] = ['label' => 'Statsahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statsah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
