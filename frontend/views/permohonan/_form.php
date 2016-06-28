<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\db\Query;
use yii\db\Command;

use frontend\models\TblKategori;
use frontend\models\TblSokongan;
use frontend\models\TblStatmohon;
use frontend\models\TblStatus;
use frontend\models\TblPeralatan;

/* @var $this yii\web\View */
/* @var $model frontend\models\Permohonan */
/* @var $form yii\widgets\ActiveForm */

$peralatan = TblPeralatan::find()->where(['permohonan_id' => $model->permohonan_id])->all();

$nombor = 1;

$alat = new Query;
$alat ->select([
    'tbl_peralatan.alat_jumlahHarga as alat_jumlahHarga',
])
->from('tbl_peralatan')

->where('tbl_peralatan.permohonan_id = "'.$model->permohonan_id.'"');

$command=$alat->createCommand();
$dataAlat=$command->queryAll();

$sumPermohonan = $alat->sum('alat_jumlahHarga');
?>

<div class = "panel panel-primary">
    <div class = "panel-heading" style = "text-align:center">
        <?= Html::a('<span class="glyphicon glyphicon-home" aria-hidden="true"></span>', ['/site/index'], [
            'class' => 'btn btn-info',
            'data-toggle'=>'tooltip', 
            'title'=>'HOME'
        ]); ?>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>', ['view', 'id' => $model->permohonan_id], [
            'class' => 'btn btn-success',
            'data-toggle'=>'tooltip', 
            'title'=>'View'
        ]); ?>
    </div>
    <div class = "panel-body">
        <?php $form = ActiveForm::begin(); ?>
        <div class = "col-lg-4">
            <?= $form->field($model, 'permohonan_id')->textInput(['readonly' => true]) ?>
        </div>
        <div class = "col-lg-4">
            <?= $form->field($model, 'kat_id')->dropDownList(
              ArrayHelper::map(TblKategori::find()->all(),'kat_id','kat_kategori'),
              ['disabled' => true]
            )?>
        </div>
        <div class = "col-lg-4">
            <?= $form->field($model, 'permohonan_tarikh')->textInput(['readonly' => true]) ?>
        </div>
        <div class = "col-lg-4">
            <?= $form->field($model, 'permohonan_pusatKos')->textInput(['readonly' => true]) ?>
        </div>
        <div class = "col-lg-4">
            <?= $form->field($model, 'statMohon_id')->dropDownList(
              ArrayHelper::map(TblStatmohon::find()->all(),'statMohon_id','statMohon_status'),
              ['disabled' => true]
            )?>
        </div>
        <div class = "col-lg-4">
            <?= $form->field($model, 'status_id')->dropDownList(
              ArrayHelper::map(TblStatus::find()->all(),'status_id','status_status'),
              ['disabled' => true]
            )?>
        </div>
        <div class = "col-lg-12"><hr></div>
        <div class = "col-lg-6" style = "background-color:#FF6A6A; height:200px"><br>
            <?= $form->field($model, 'permohonan_komenpnc')->textarea(['rows' => 5]) ?>
        </div>
        <div class = "col-lg-6" style = "background-color:#FF6A6A; height:200px"><br>
            <br><font style = "text-color:black">
                Status ini untuk menentukan samaada permohonan ini disokong ataupun tidak.
            </font><br><br>
            <?= $form->field($model, 'sok_id')->dropDownList(
              ArrayHelper::map(TblSokongan::find()->all(),'sok_id','sok_sokongan')
            )?>
        </div>        
        <div class="form-group col-lg-12" style = "text-align:center">
            <br><br>
            <?= Html::submitButton($model->isNewRecord ? 'Hantar' : 'Hantar', 
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <hr>
        </div>
        <?php ActiveForm::end(); ?>

        <table class = "table table-bordered table-hover">
            <thead style = "background-color:#7CFC00;">
                <th style = "text-align:center">Bil.</th>
                <th style = "text-align:center">Nama<br>Alat</th>
                <th style = "text-align:center">Kod<br>Akaun</th>
                <th style = "text-align:center">Kuantiti</th>
                <th style = "text-align:center">Harga<br>Seunit</th>
                <th style = "text-align:center">Jumlah<br>Harga</th>
                <th style = "text-align:center">Tujuan<br>Pembelian</th>
                <th style = "text-align:center">Nama & Jawatan<br>Pegawai Bertanggungjawab</th>
                <th style = "text-align:center">Lokasi<br>Cadangan</th>
            </thead>
            <tbody>
                <?php $nombor = $nombor; foreach ($peralatan as $peralatan): ?>
                <tr>
                    <td style = "text-align:center"><?= $nombor++; ?> .</td>
                    <td><?= $peralatan['alat_nama'] ?></td>
                    <td style = "text-align:center"><?= $peralatan['alat_kodAkaun'] ?></td>
                    <td style = "background-color:#00FFFF; text-align:center"><?= $peralatan['alat_kuantiti'] ?></td>
                    <td style = "background-color:#00FFFF; text-align:center"><?= $peralatan['alat_hargaUnit'] ?></td>
                    <td style = "background-color:#FFA500; text-align:center"><?= $peralatan['alat_jumlahHarga'] ?></td>
                    <td><?= $peralatan['alat_tujuan'] ?></td>
                    <td style = "text-align:center"><?= $peralatan['alat_pegawai'] ?><br><?= $peralatan['alat_jawatan'] ?></td>
                    <td><?= $peralatan['alat_lokasi'] ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td style = "background-color:#E0E0E0; text-align:center"></td>
                    <td style = "background-color:#E0E0E0; text-align:center"></td>
                    <td style = "background-color:#E0E0E0; text-align:center"></td>
                    <td style = "background-color:#E0E0E0; text-align:center"></td>
                    <td style = "background-color:#FFFF00; text-align:center"><b>Jumlah</b></td>
                    <td style = "background-color:#FFFF00; text-align:center"><b><?= $sumPermohonan; ?></b></td>
                    <td style = "background-color:#E0E0E0; text-align:center"></td>
                    <td style = "background-color:#E0E0E0; text-align:center"></td>
                    <td style = "background-color:#E0E0E0; text-align:center"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
