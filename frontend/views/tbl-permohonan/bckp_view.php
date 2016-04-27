<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPermohonan */

// $this->title = $model->permohonan_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Permohonans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-permohonan-view">

    <p align="left">
        <table class="table-atas">
                <tr>
                    <th>Permohonan ID </th>
                    <td><b> : </b></td>
                    <td><?= $model->permohonan_id ?></td>
                </tr>
                <tr>
                    <th>ID Pemohon </th>
                    <td><b> : </b></td>
                    <td><?= $model->user_id ?></td>
                </tr>
                <tr>
                    <th>Tarikh Permohonan </th>
                    <td><b> : </b></td>
                    <td><?= $model->permohonan_tarikh ?></td>
                </tr>
                <tr>
                    <th>Pusat Kos </th>
                    <td><b> : </b></td>
                    <td><?= $model->permohonan_pusatKos ?></td>
                </tr>
                <tr>
                    <th>Status Permohonan </th>
                    <td><b> : </b></td>
                    <td><?= $model->statMohon_id ?></td>
                </tr>
                <tr>
                    <th>Catitan </th>
                    <td><b> : </b></td>
                    <td><?= $model->dekan_id ?></td>
                </tr>
                <tr>
                    <th>Catitan </th>
                    <td><b> : </b></td>
                    <td><?= $model->status_id ?></td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <?= Html::a('Update', ['update', 'id' => $model->permohonan_id], ['class' => 'btn btn-primary btn-sm']) ?>
                        <?= Html::a('Delete', ['delete', 'id' => $model->permohonan_id], [
                            'class' => 'btn btn-danger btn-sm',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>

                        <?= Html::a('PDF', ['report', 'id' => $model->permohonan_id], [
                            'class' => 'btn btn-info btn-sm',
                            'target'=>'_blank', 
                            'data-toggle'=>'tooltip', 
                            'title'=>'Will open the generated PDF file in a new window'
                        ]); ?>
                    </td>
                </tr> 
        </table>
    </p>
    
    <div class="row" align="center">
    <div class="col-lg-15" align="center">
        <h3><b>JADUAL PERALATAN</b></h3><br>
            <div class="table-responsive" align="center">
                <table class="table table-bordered table-hover table-striped" align="center">
                    <thead style="font-size: 12px;">
                        <tr class="info" align="center">
                            <th>Peralatan</th>
                            <th>Kod Akaun</th>
                            <th>Kuantiti</th>
                            <th>Harga Seunit</th>
                            <th>Jumlah Harga</th>
                            <th>Kelulusan Jawatankuasa</th>
                            <th>Kategori Pelanggan</th>
                            <th>Tujuan Pembelian</th>
                            <th>Kategori Permohonan</th>
                            <th>Jenis Peruntukan</th>
                            <th>Program Baru & Tahap Pengajian</th>
                            <th>Tahun Disediakan</th>
                            <th>Nama Pegawai & Jawatan</th>
                            <th>Lokasi cadangan</th>
                            <th>Buku Log</th>
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
