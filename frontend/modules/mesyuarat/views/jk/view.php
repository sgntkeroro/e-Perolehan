<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\mesyuarat\models\Jk */

$this->title = $model->jk_id;
$this->params['breadcrumbs'][] = ['label' => 'Jks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jk-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->jk_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->jk_id], [
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
            'jk_id',
            'jk_nama',
        ],
    ]) ?>

</div>
