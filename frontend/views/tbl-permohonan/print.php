<?php
    use yii\helpers\Html;
    use yii\db\Query;
    use yii\db\Command;

    $query = new Query;
    $query ->select([
    'tbl_unit.unit_nama as unit'
    ])
    ->from('tbl_unit')
    ->innerJoin('tbl_bhgnmod','tbl_unit.unit_id=tbl_bhgnmod.unit_id')
    ->innerJoin('tbl_moderator','tbl_bhgnmod.bm_id=tbl_moderator.bm_id')
    ->where('tbl_unit.unit_id=tbl_bhgnmod.unit_id')
    ->andWhere('tbl_moderator.user_id= "'.Yii::$app->user->identity->id.'"'); 

    $command=$query->createCommand();
    $data=$command->queryAll();
?>

<style type="text/css">
	table
        {
            border-left: 1px solid;
            border-top: 1px solid;
             
            border-spacing:0;
            border-collapse: collapse; 

            counter-reset: rowNumber;             
        }

    table td 
        {
            border-right: 1px solid;
            border-bottom: 1px solid;
            padding: 2mm;
        }
        
</style>

<div style="page-break-inside: avoid">

<p style="font-size:14px" align=center> 
	<font face="arial">
		<u><b>
			JADUAL PERMOHONAN PEMBELIAN PERALATAN TAHUN <?= date('Y') ?>
		</b></u>
	</font>
</p>

<p style="font-size:12px" align=left>
	<font face="arial">
		PUSAT KOS : <?= $model->permohonan_pusatKos ?><br>
		FAKULTI / BAHAGIAN / CAWANGAN : 
			<?php foreach ($data as $bahagian): ?>
	        	<?= $bahagian['unit'] ?>
			<?php endforeach; ?>
	</font>
</p>

<p align=center width=100%>
	<font face="arial">
			<table style="font-size:11px; face:arial; text-align:center">
                <tr style="background-color:grey">
                    <td>Peralatan</td>
                    <td>Kod Akaun</td>
                    <td>Kuantiti</td>
                    <td>Harga Seunit</td>
                    <td>Jumlah</td>
                    <td><b>*</b><br>Kelulusan Jawatankuasa</td>
                    <td><b>**</b><br>Kategori Pelanggan</td>
                    <td>Tujuan Pembelian</td>
                    <td><b>***</b><br>Kategori Permohonan</td>
                    <td>Jenis Peruntukan</td>
                    <td>Program Baru & Tahap Pengajian</td>
                    <td>Tahun Disediakan</td>
                    <td>Nama Pegawai & Jawatan</td>
                    <td>Lokasi cadangan</td>
                </tr>

                <?php foreach ($view as $row): ?>
                <tr>
                	<td style="text-align:left"><?= $row['alat_nama'] ?></td>
                	<td><?= $row['alat_kodAkaun'] ?></td>
                	<td><?= $row['alat_kuantiti'] ?></td>
                	<td><?= $row['alat_hargaUnit'] ?></td>
                	<td><?= $row['alat_jumlahHarga'] ?></td>
                	<td><?= $row['jk_id'] ?></td>
                	<td><?= $row['katPelanggan_id'] ?></td>
                	<td style="text-align:left"><?= $row['alat_tujuan'] ?></td>
                	<td><?= $row['katPermohonan_id'] ?></td>
                	<td><?= $row['alat_jenisPeruntukan'] ?></td>
                	<td><?= $row['alat_programBaru'] ?><br><?= $row['alat_tahap'] ?></td>
                	<td><?= $row['tahun_tahun'] ?></td>
                	<td><?= $row['alat_pegawai'] ?><br><?= $row['alat_jawatan'] ?></td>
                	<td style="text-align:left"><?= $row['alat_lokasi'] ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
	</font>
</p>

</div>

<p style="font-size:12px" align=left>
	<font face="arial">
		<b>Nota :</b><br>
		<table>
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
