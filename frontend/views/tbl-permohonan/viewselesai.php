<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPermohonan */

$this->title = 'ID : '.$model->permohonan_id;
$sokong = $model->sokongan;
$nombor = 1;
?>

<style type="text/css">
    .table
        {
          /*border-left: 2px solid;
          border-top: 2px solid;*/
           
          border-spacing:0;
          border-collapse: collapse;            
        }

    table td 
        {
            /*border-right: 2px solid;
            border-bottom: 2px solid;*/
            padding: 2mm;
        }

    .divInlineLeft {
        display: inline;
        float: left
    } 
    .divInlineRight {
        display: inline;
        float: right
    }

    .span { 
    display:inline-block;
    width: 270px;
    }       
</style>

<div>
<div class="panel panel-primary" align="center">
    <!-- Default panel contents -->
    <div class="panel-heading">
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
    </div><br>

    <div class="panel panel-info" style="width:99%;">
        <div class="panel-heading"><h4><b>BUTIRAN PERMOHONAN</b></h4></div>
        <div class="panel-body">
            <p>

	        <?= Html::a('<span class="glyphicon glyphicon-file" aria-hidden="true"></span>', ['pdf', 'id' => $model->permohonan_id], [
	            'class' => 'btn btn-info btn-sm',
	            'target'=>'_blank', 
	            'data-toggle'=>'tooltip', 
	            'title'=>'Will open the generated PDF file in a new window'
	        ]); ?>
                <!-- Table -->
                <table class="table">
                    <thead>
                        <th>Permohonan ID</th>
                        <th>Nama Pemohon</th>
                        <th>Tarikh Permohonan</th>
                        <th>Pusat Kos</th>
                        <th>Status Sokongan</th>
                        <th>Komen</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $model->permohonan_id ?></td>
                            <td>
                                <?php foreach ($viewAtas as $mod_nama): ?>
                                    <?= $mod_nama['mod_nama'] ?>
                                <?php endforeach; ?>
                            </td>
                            <td><?= $model->permohonan_tarikh ?></td>
                            <td><?= $model->permohonan_pusatKos ?></td>
                            <td style = "background-color:#FFD700"><?= $sokong->sok_sokongan ?></td>
                            <td style = "background-color:#FFD700"><?= $model->permohonan_komenpnc ?></td>
                        </tr>
                    </tbody>
                </table>
            </p>
        </div>
    </div>

    <div class="panel panel-info" style="width:99%;">
        <div class="panel-heading">
            <h4><b>SURAT PENGESAHAN</b></h4>
        </div>
        <div class="panel-body">
            <p>
                <!-- Table -->
                <table class="table">
                    <thead>
                        <th>No. Permohonan</th>
                        <th>Surat</th>
                        <th>Tarikh Surat</th>
                        <th>Deskripsi</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <?= $model->permohonan_id ?>
                            </td>
                            <td>
                                <?php foreach ($suratSah as $suratSah_nama): ?>
                                    <?= Html::a($suratSah_nama['suratSah_nama'], ['list', 'id' => $suratSah_nama->suratSah_id], [
                                        'target'=>'_blank', 
                                        'data-toggle'=>'tooltip', 
                                        'title'=>'Will open the generated PDF file in a new window'
                                    ]); ?>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <?php foreach ($suratSah as $suratSah_tarikh): ?>
                                    <?= $suratSah_tarikh['suratSah_tarikh'] ?>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <?php foreach ($suratSah as $suratSah_deskripsi): ?>
                                    <?= $suratSah_deskripsi['suratSah_deskripsi'] ?>
                                <?php endforeach; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </p>
        </div>
    </div> 

    <div class="panel-body" align="center">
        <div class="alert alert-info span" role="alert">
            <b><?= Html::tag('span', 'Status Permohonan', [
                'title'=>'Anda dikehendaki memuatnaik salinan surat pengesahan yang telah disahkan dan ditandatangan oleh Dekan / PTJ terlebih dahulu supaya permohonan anda akan diproses',
                'data-toggle'=>'tooltip',
                'style'=>'cursor:pointer;'
            ]); ?></b><br><br>
            
            <font color="black">
                <?php foreach ($viewStatus as $statMohon_status): ?>
                    <?= $statMohon_status['statMohon_status'] ?>
                <?php endforeach; ?>
            </font>
        </div>

        <div class="alert alert-warning span" role="alert">
            <b><?= Html::tag('span', 'Status Mesyuarat', [
                'title'=>'Dikemaskini setelah mesyuarat',
                'data-toggle'=>'tooltip',
                'style'=>'cursor:pointer;'
            ]); ?></b><br><br>
            
            <font color="black">
                <?php foreach ($viewStatus as $statMesyua_status): ?>
                    <?= Html::a( $statMesyua_status['statMesyua_status'], 
                        ['statusselesai', 'id' => $statMesyua_status['permohonan_id']]) ?>
                <?php endforeach; ?>
            </font>
        </div>

        <div class="alert alert-danger span" role="alert">
            <b><?= Html::tag('span', 'Status', [
                'title'=>'Status ini menunjukkan sama ada permohonan ini sudah selesai atau pun belum',
                'data-toggle'=>'tooltip',
                'style'=>'cursor:pointer;'
            ]); ?></b><br><br>
            
            <font color="black">
                <?php foreach ($viewStatus as $status_status): ?>
                    <?= $status_status['status_status'] ?>
                <?php endforeach; ?>
            </font>
        </div>
    </div>

    <div class="panel panel-info" style="width:99%;">
        <div class="panel-heading"><h4><b>JADUAL PERALATAN</b></h4></div>
        <div class="panel-body">
            <P>
                <div align="center" class="table-responsive">        
                    <table class="table-bordered table-striped table-hover text-center"  style="font-size: 12px;">
                        <thead>
                            <tr style="background-color:#D3D3D3; font-size: 14px;">
                                <td class="text-left" style="padding:2mm;">Bil.</td>
                                <td class="text-left" style="padding:2mm;">Peralatan</td>
                                <td class="text-left" style="padding:2mm;">Kod Akaun</td>
                                <td class="text-left" style="padding:2mm;">Kuantiti</td>
                                <td class="text-left" style="padding:2mm;">Harga Seunit</td>
                                <td class="text-left" style="padding:2mm;">Jumlah Harga</td>
                                <td class="text-left" style="padding:2mm;">*<br>Kelulusan Jawatankuasa</td>
                                <td class="text-left" style="padding:2mm;">**<br>Kategori Pelanggan</td>
                                <td class="text-left" style="padding:2mm;">Tujuan Pembelian</td>
                                <td class="text-left" style="padding:2mm;">***<br>Kategori Permohonan</td>
                                <td class="text-left" style="padding:2mm;">Jenis Peruntukan</td>
                                <td class="text-left" style="padding:2mm;">Program Baru & Tahap Pengajian</td>
                                <td class="text-left" style="padding:2mm;">Tahun Disediakan</td>
                                <td class="text-left" style="padding:2mm;">Nama Pegawai & Jawatan</td>
                                <td class="text-left" style="padding:2mm;">Lokasi cadangan</td>
                            </tr>
                        </thead>
                        <tbody>                        
                            <?php $nombor = $nombor; foreach ($view as $row){
                                    echo "<tr>";
                                    echo "<td>".$nombor++."</td>";
                                    echo "<td class='text-left'>".$row['alat_nama']."</td>";
                                    echo "<td>".$row['alat_kodAkaun']."</td>";                                    
                                    echo "<td>".$row['alat_kuantiti']."</td>";
                                    echo "<td>".$row['alat_hargaUnit']."</td>";
                                    echo "<td>".$row['alat_jumlahHarga']."</td>";
                                    echo "<td>".$row['jk_id']."</td>";
                                    echo "<td>".$row['katPelanggan_id']."</td>";
                                    echo "<td class='text-left'>".$row['alat_tujuan']."</td>";
                                    echo "<td>".$row['katPermohonan_id']."</td>";
                                    echo "<td>".$row['jen_nama']."</td>";
                                    echo "<td>".$row['alat_programBaru']."<br><br>".$row['alat_tahap']."</td>";
                                    echo "<td>".$row['tahun_tahun']."</td>";
                                    echo "<td>".$row['alat_pegawai']."<br><br>".$row['alat_jawatan']."</td>";
                                    echo "<td class='text-left'>".$row['alat_lokasi']."</td>";
                                    echo "</tr>";
                                }
                            ?>                        
                        </tbody>
                    </table>
                </div>    
            </P>
            <p>
                <font face="arial">
                    <br><b>N O T A</b><br>
                    <table class="table table-bordered"  style="font-size: 12px; width:50%">
                        <tr>
                            <td><b>*</b><br>
                        1 - JAPD <br>
                        2 - JPPK / JTICT <br><br></td>

                        <td><b>**</b><br>
                        1 - Staf Akademik <br>
                        2 - Staf Pentadbiran <br>
                        3 - Pelajar<br><br></td>

                        <td><b>***</b><br>
                        1 - Tambahan kepada yang sedia ada <br>
                        2 - Gantian bagi yang dilupuskan <br>
                        3 - Permohonan baru<br><br></td>
                        </tr>
                    </table>
                </font>
            </p>
        </div>
    </div>
</div>    
</div>
    


<?php
$js = <<< 'SCRIPT'
/* To initialize BS3 tooltips set this below */
$(function () { 
    $("[data-toggle='tooltip']").tooltip(); 
});;
/* To initialize BS3 popovers set this below */
$(function () { 
    $("[data-toggle='popover']").popover(); 
});
SCRIPT;
// Register tooltip/popover initialization javascript
$this->registerJs($js);
?>