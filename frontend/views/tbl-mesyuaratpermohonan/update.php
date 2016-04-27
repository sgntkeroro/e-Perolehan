<?php

	use yii\helpers\Html;
    use yii\db\Query;
    use yii\db\Command;

	/* @var $this yii\web\View */
	/* @var $model frontend\models\TblMesyuaratpermohonan */

	$this->title = 'Kemaskini Permohonan : ' . $model->mesyPerm_id;
	$this->params['breadcrumbs'][] = ['label' => 'Senarai Permohonan', 'url' => ['index']];
	$this->params['breadcrumbs'][] = ['label' => 'Permohonan', 'url' => ['view', 'id' => $model->mesyPerm_id]];
	$this->params['breadcrumbs'][] = 'Update';

	$query = new Query;
    $query ->select([
    'tbl_peralatan.alat_nama as alat_nama',
    'tbl_peralatan.alat_kuantiti as alat_kuantiti',
    'tbl_peralatan.alat_hargaUnit as alat_hargaUnit',
    'tbl_peralatan.alat_jumlahHarga as alat_jumlahHarga',
    ])
    ->from('tbl_peralatan')
    ->innerJoin('tbl_permohonan','tbl_peralatan.permohonan_id=tbl_permohonan.permohonan_id')
    ->where('tbl_peralatan.permohonan_id = "'.$model->permohonan_id.'"');
    $command=$query->createCommand();
    $data=$command->queryAll();

    $bahagian = new Query;
    $bahagian ->select([
    'tbl_bahagian.bahagian_nama as bahagian_nama',
    ])
    ->from('tbl_bahagian')
    ->innerJoin('tbl_bhgnmod','tbl_bahagian.bahagian_id=tbl_bhgnmod.bahagian_id')
    ->innerJoin('tbl_moderator','tbl_bhgnmod.bm_id=tbl_moderator.bm_id')
    ->where('tbl_bahagian.bahagian_id=tbl_bhgnmod.bahagian_id')
    ->andWhere('tbl_moderator.user_id= "'.Yii::$app->user->identity->id.'"');
    
    $command=$bahagian->createCommand();
    $databahagian=$command->queryAll();
?>

<div class="tbl-mesyuaratpermohonan-update">

    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <?= Html::a('<span class="glyphicon glyphicon-home" aria-hidden="true"> HOME</span>', ['//site/index'], ['class' => 'btn btn-info']) ?>
        </div>
        <div class="btn-group" role="group">
            <?= Html::a('<span class="glyphicon glyphicon-envelope" aria-hidden="true"> PENGESAHAN PERMOHONAN</span>', ['//tbl-mesyuaratpermohonan/index'], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="btn-group" role="group">
            <?= Html::a('<span class="glyphicon glyphicon-user" aria-hidden="true"> PROFIL PENGGUNA</span>', ['//tbl-cspi/index'], ['class' => 'btn btn-info']) ?>
        </div>
    </div><br><br>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsAlatmesyuarat' => $modelsAlatmesyuarat,
        'view'=>$data,
        'viewbahagian'=>$databahagian,
    ]) ?>

</div>
