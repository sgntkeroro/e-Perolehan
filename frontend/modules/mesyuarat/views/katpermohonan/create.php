<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\mesyuarat\models\Katpermohonan */

$this->title = 'Create Katpermohonan';
$this->params['breadcrumbs'][] = ['label' => 'Katpermohonans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="katpermohonan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
