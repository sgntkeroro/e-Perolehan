<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use frontend\models\TblStatsah;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPengesahan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-pengesahan-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-lg-4">
        <?= $form->field($model, 'statSah_id')->dropDownList(
            ArrayHelper::map(TblStatsah::find()->all(),'statSah_id','statSah_nama')
        ) ?>
    </div>
    <div class="col-lg-4">
        <?= $form->field($model, 'sah_tarikh')->textInput(['value'=>date('Y-m-d')]) ?>
    </div>
    <div class="col-lg-4">
        <?= $form->field($model, 'sah_catitan')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Hantar' : 'Hantar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <hr>

    <div class="tbl-permohonan-view">
    
        <div class="row" align="center">
        <div class="col-lg-15" align="center">
            <h3><b>JADUAL PERALATAN</b></h3><br>
                <div class="table-responsive" align="center">
                    <table class="table table-bordered table-hover table-striped text-center">
                        <thead style="font-size: 12px;">
                            <tr class="info">
                                <th class="text-center">Peralatan</th>
                                <th class="text-center">Kod Akaun</th>
                                <th class="text-center">Kuantiti</th>
                                <th class="text-center">Harga Seunit</th>
                                <th class="text-center">Jumlah Harga</th>
                                <th class="text-center">Kelulusan Jawatankuasa</th>
                                <th class="text-center">Kategori Pelanggan</th>
                                <th class="text-center">Tujuan Pembelian</th>
                                <th class="text-center">Kategori Permohonan</th>
                                <th class="text-center">Jenis Peruntukan</th>
                                <th class="text-center">Program Baru & Tahap Pengajian</th>
                                <th class="text-center">Tahun Disediakan</th>
                                <th class="text-center">Nama Pegawai & Jawatan</th>
                                <th class="text-center">Lokasi cadangan</th>
                                <th class="text-center">Buku Log</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px;">                        
                            <?php 
                                foreach ($view as $row){
                                    echo "<tr>";
                                    echo "<td>".$row['alat_nama']."</td>";
                                    echo "<td>".$row['alat_kodAkaun']."</td>";                                    
                                    echo "<td>".$row['alat_kuantiti']."</td>";
                                    echo "<td>".$row['alat_hargaUnit']."</td>";
                                    echo "<td>".$row['alat_jumlahHarga']."</td>";
                                    echo "<td>".$row['jk_id']."</td>";
                                    echo "<td>".$row['katPelanggan_id']."</td>";
                                    echo "<td>".$row['alat_tujuan']."</td>";
                                    echo "<td>".$row['katPermohonan_id']."</td>";
                                    echo "<td>".$row['alat_jenisPeruntukan']."</td>";
                                    echo "<td>".$row['alat_programBaru']."<br><br>".$row['alat_tahap']."</td>";
                                    echo "<td>".$row['tahunSedia_id']."</td>";
                                    echo "<td>".$row['alat_pegawai']."<br><br>".$row['alat_jawatan']."</td>";
                                    echo "<td>".$row['alat_lokasi']."</td>";
                                    echo "<td>".$row['alat_bukuLog']."</td>";
                                    echo "</tr>";
                                }
                            ?>                        
                        </tbody>
                    </table>
                </div>
        </div>
        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
