<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\mesyuarat\models\Statsah */

$this->title = $model->statSah_id;
$this->params['breadcrumbs'][] = ['label' => 'Statsahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statsah-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->statSah_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->statSah_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'statSah_id',
            'statSah_nama',
        ],
    ]) ?>

</div>
