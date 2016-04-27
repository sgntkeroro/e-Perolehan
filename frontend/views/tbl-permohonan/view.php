<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPermohonan */

$this->title = $model->permohonan_id;
$this->params['breadcrumbs'][] = ['label' => 'Senarai Permohonan', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Permohonan No. : ' .$this->title;
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
    <div class="btn-group btn-group-justified" role="group" aria-label="...">
    <div class="btn-group" role="group">
        <?= Html::a('<span class="glyphicon glyphicon-home" aria-hidden="true"> HOME</span>', ['//site/index'], ['class' => 'btn btn-info']) ?>
    </div>
    <div class="btn-group" role="group">
        <?= Html::a('<span class="glyphicon glyphicon-envelope" aria-hidden="true"> PERMOHONAN</span>', ['//tbl-permohonan/index'], ['class' => 'btn btn-primary']) ?>
    </div>
    <div class="btn-group" role="group">
        <?= Html::a('<span class="glyphicon glyphicon-user" aria-hidden="true"> PROFIL PENGGUNA</span>', ['//tbl-moderator/index'], ['class' => 'btn btn-info']) ?>
    </div>
</div><br><br>

<div class="panel panel-primary" align="center">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <?= Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', ['update', 'id' => $model->permohonan_id], [
        'class' => 'btn btn-success btn-sm']) ?>

        <?= Html::a('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', ['delete', 'id' => $model->permohonan_id], [
            'class' => 'btn btn-danger btn-sm',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

        <?= Html::a('<span class="glyphicon glyphicon-file" aria-hidden="true"></span>', ['pdf', 'id' => $model->permohonan_id], [
            'class' => 'btn btn-info btn-sm',
            'target'=>'_blank', 
            'data-toggle'=>'tooltip', 
            'title'=>'Will open the generated PDF file in a new window'
        ]); ?>
    </div><br>

    <div class="panel panel-info" style="width:99%;">
        <div class="panel-heading"><h4><b>BUTIRAN PERMOHONAN</b></h4></div>
        <div class="panel-body">
            <p>
                <!-- Table -->
                <table class="table">
                    <thead>
                        <th>Permohonan ID</th>
                        <th>Nama Pemohon</th>
                        <th>Tarikh Permohonan</th>
                        <th>Pusat Kos</th>
                        <th>Dekan / PTJ</th>
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
                            <td>
                                <?php foreach ($viewAtas as $dekan_nama): ?>
                                    <?= $dekan_nama['dekan_nama'] ?>
                                <?php endforeach; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </p>
        </div>
    </div>

    <div class="panel panel-info" style="width:99%;">
        <div class="panel-heading">
            <h4><b>SURAT PENGESAHAN</b></h4>
            <?= Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', ['updatesuratsah', 'id' => $model->permohonan_id], [
            'class' => 'btn btn-success btn-sm']) ?>
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
                                <?php foreach ($viewSurat as $permohonan_id): ?>
                                    <?= $permohonan_id['permohonan_id'] ?>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <?php foreach ($viewSurat as $suratSah_nama): ?>
                                    <?= $suratSah_nama['suratSah_nama'] ?>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <?php foreach ($viewSurat as $suratSah_tarikh): ?>
                                    <?= $suratSah_tarikh['suratSah_tarikh'] ?>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <?php foreach ($viewSurat as $suratSah_deskripsi): ?>
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
        <div class="alert alert-success span" role="alert">
            <b><?= Html::tag('span', 'Status Pengesahan Dekan / PTJ', [
                'title'=>'Pengesahan dari Dekan / PTJ',
                'data-toggle'=>'tooltip',
                'style'=>'cursor:pointer;'
            ]); ?></b><br><br>
            
            <font color="black">
                <?php foreach ($viewStatus as $statSah_nama): ?>
                    <?= $statSah_nama['statSah_nama'] ?>
                <?php endforeach; ?>
            </font>
        </div>

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
                    <?= $statMesyua_status['statMesyua_status'] ?>
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
                            <?php 
                                foreach ($view as $row){
                                    echo "<tr>";
                                    echo "<td class='text-left'>".$row['alat_nama']."</td>";
                                    echo "<td>".$row['alat_kodAkaun']."</td>";                                    
                                    echo "<td>".$row['alat_kuantiti']."</td>";
                                    echo "<td>".$row['alat_hargaUnit']."</td>";
                                    echo "<td>".$row['alat_jumlahHarga']."</td>";
                                    echo "<td>".$row['jk_id']."</td>";
                                    echo "<td>".$row['katPelanggan_id']."</td>";
                                    echo "<td class='text-left'>".$row['alat_tujuan']."</td>";
                                    echo "<td>".$row['katPermohonan_id']."</td>";
                                    echo "<td>".$row['alat_jenisPeruntukan']."</td>";
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
