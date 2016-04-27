<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\mesyuarat\models\Usermesyuarat */

$this->title = 'Create Usermesyuarat';
$this->params['breadcrumbs'][] = ['label' => 'Usermesyuarats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usermesyuarat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
