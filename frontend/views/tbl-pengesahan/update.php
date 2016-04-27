<?php
    use yii\helpers\Html;
    use yii\db\Query;
    use yii\db\Command;

    /* @var $this yii\web\View */
    /* @var $model frontend\models\TblPengesahan */
    // $this->title = 'Kemaskini Permohonan : ' . $model->mesyPerm_id;
    $this->params['breadcrumbs'][] = ['label' => 'Senarai Permohonan', 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => 'Permohonan', 'url' => ['view', 'id' => $model->sah_id]];
    $this->params['breadcrumbs'][] = 'Kemaskini';

    $query = new Query;
    $query ->select([
    'tbl_peralatan.alat_nama as alat_nama',
    'tbl_peralatan.alat_kodAkaun as alat_kodAkaun',
    'tbl_peralatan.alat_kuantiti as alat_kuantiti',
    'tbl_peralatan.alat_hargaUnit as alat_hargaUnit',
    'tbl_peralatan.alat_jumlahHarga as alat_jumlahHarga',
    'tbl_peralatan.jk_id as jk_id',
    'tbl_peralatan.katPelanggan_id as katPelanggan_id',
    'tbl_peralatan.alat_tujuan as alat_tujuan',
    'tbl_peralatan.katPermohonan_id as katPermohonan_id',
    'tbl_peralatan.alat_jenisPeruntukan as alat_jenisPeruntukan',
    'tbl_peralatan.alat_programBaru as alat_programBaru',
    'tbl_peralatan.alat_tahap as alat_tahap',
    'tbl_peralatan.tahunSedia_id as tahunSedia_id',
    'tbl_peralatan.alat_pegawai as alat_pegawai',
    'tbl_peralatan.alat_jawatan as alat_jawatan',
    'tbl_peralatan.alat_lokasi as alat_lokasi',
    'tbl_peralatan.alat_bukuLog as alat_bukuLog'
    ])
    ->from('tbl_peralatan')
    ->innerJoin('tbl_permohonan','tbl_peralatan.permohonan_id=tbl_permohonan.permohonan_id')
    ->where('tbl_permohonan.permohonan_id = "'.$model->permohonan_id.'"')
    ->where('tbl_peralatan.permohonan_id = "'.$model->permohonan_id.'"');
    $command=$query->createCommand();
    $data=$command->queryAll();

?>

<div class="tbl-pengesahan-update">

    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <?= Html::a('<span class="glyphicon glyphicon-home" aria-hidden="true"> HOME</span>', ['//site/index'], ['class' => 'btn btn-info']) ?>
        </div>
        <div class="btn-group" role="group">
            <?= Html::a('<span class="glyphicon glyphicon-envelope" aria-hidden="true"> PENGESAHAN PERMOHONAN</span>', ['//tbl-pengesahan/index'], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="btn-group" role="group">
            <?= Html::a('<span class="glyphicon glyphicon-user" aria-hidden="true"> PROFIL PENGGUNA</span>', ['//tbl-dekan/index'], ['class' => 'btn btn-info']) ?>
        </div>
    </div><br><br>

    <?= $this->render('_form', [
        'model' => $model,
        'view'=>$data,
    ]) ?>

</div>
