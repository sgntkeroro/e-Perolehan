<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\MinPerkara */

$this->title = 'Create Min Perkara';
$this->params['breadcrumbs'][] = ['label' => 'Min Perkaras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="min-perkara-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
