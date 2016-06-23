<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\mesyuarat\models\Jk */

$this->title = 'Create Jk';
$this->params['breadcrumbs'][] = ['label' => 'Jks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
