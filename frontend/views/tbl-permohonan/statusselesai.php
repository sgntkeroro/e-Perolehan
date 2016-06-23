<?php

use yii\helpers\Html;
use frontend\models\TblMesyuaratpermohonan;
use frontend\models\TblStatmesyua;

$this->title = 'Status Mesyuarat';

$status = TblMesyuaratpermohonan::find()->where(['permohonan_id' => $model->permohonan_id])->one();
$mesy = TblStatmesyua::find()->where(['statMesyua_id' => $status->statMesyua_id])->one();
?>

<div class = "panel panel-primary">
	<div class = "panel-heading" style = "text-align:center">
		<?= Html::a('<span class="glyphicon glyphicon-home" aria-hidden="true"></span>', ['/site/index'], [
            'class' => 'btn btn-info',
            'data-toggle'=>'tooltip', 
            'title'=>'HOME'
        ]); ?>

        <?= Html::a('<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>', 
            ['index'], [
            'class' => 'btn btn-info',
            'data-toggle'=>'tooltip', 
            'title'=>'Senarai Permohonan'
        ]); ?>

        <?= Html::a('<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>', 
            ['viewselesai', 'id' => $status->permohonan_id], [
            'class' => 'btn btn-success',
            'data-toggle'=>'tooltip', 
            'title'=>'Permohonan'
        ]); ?>
    </div>
	<div class = "panel-body">
		<font style = "text-align:center">
			<br><h4><b>STATUS MESYUARAT</b></h4><br>
		</font>
		<table class = "table">
			<thead>
				<th>Permohonan ID</th>
				<th>Status Mesyuarat</th>
				<th>Tarikh Mesyuarat</th>
				<th>Catitan</th>
			</thead>
			<tbody>
				<tr>
					<td><?= $status->permohonan_id ?></td>
					<td><?= $mesy->statMesyua_status ?></td>
					<td><?= $status->mesyPerm_tarikh ?></td>
					<td><?= $status->mesyPerm_catitan ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>