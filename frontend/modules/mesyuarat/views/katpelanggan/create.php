<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\mesyuarat\models\Katpelanggan */

$this->title = 'Create Katpelanggan';
$this->params['breadcrumbs'][] = ['label' => 'Katpelanggans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="katpelanggan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
