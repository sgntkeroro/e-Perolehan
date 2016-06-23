<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\MinPerkaraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Min Perkaras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="min-perkara-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Min Perkara', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'min_id',
            'perkara_bil',
            'perkara_tajuk:ntext',
            'perkara_isi:ntext',
            // 'perkara_maklumat:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
