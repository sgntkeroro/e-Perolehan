<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\mesyuarat\models\Bukulog */

$this->title = 'Create Bukulog';
$this->params['breadcrumbs'][] = ['label' => 'Bukulogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bukulog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
