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

    $nombor = 1;
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
                    <td><font face="arial">Bil.</font></td>
                    <td><font face="arial">Peralatan</font></td>
                    <td><font face="arial">Kod Akaun</font></td>
                    <td><font face="arial">Kuantiti</font></td>
                    <td><font face="arial">Harga Seunit</font></td>
                    <td><font face="arial">Jumlah</font></td>
                    <td><font face="arial"><b>*</b><br>Kelulusan Jawatankuasa</font></td>
                    <td><font face="arial"><b>**</b><br>Kategori Pelanggan</font></td>
                    <td><font face="arial">Tujuan Pembelian</font></td>
                    <td><font face="arial"><b>***</b><br>Kategori Permohonan</font></td>
                    <td><font face="arial">Jenis Peruntukan</font></td>
                    <td><font face="arial">Program Baru & Tahap Pengajian</font></td>
                    <td><font face="arial">Tahun Disediakan</font></td>
                    <td><font face="arial">Nama Pegawai & Jawatan</font></td>
                    <td><font face="arial">Lokasi cadangan</font></td>
                </tr>

                <?php $nombor = $nombor; foreach ($view as $row): ?>
                <tr>
                    <td style="text-align:left"><font face="arial"><?= $nombor++ ?> . </font></td>
                	<td style="text-align:left"><font face="arial"><?= $row['alat_nama'] ?></font></td>
                	<td><font face="arial"><?= $row['alat_kodAkaun'] ?></font></td>
                	<td><font face="arial"><?= $row['alat_kuantiti'] ?></font></td>
                	<td><font face="arial"><?= $row['alat_hargaUnit'] ?></font></td>
                	<td><font face="arial"><?= $row['alat_jumlahHarga'] ?></font></td>
                	<td><font face="arial"><?= $row['jk_id'] ?></font></td>
                	<td><font face="arial"><?= $row['katPelanggan_id'] ?></font></td>
                	<td style="text-align:left"><font face="arial"><?= $row['alat_tujuan'] ?></font></td>
                	<td><font face="arial"><?= $row['katPermohonan_id'] ?></font></td>
                	<td><font face="arial"><?= $row['jen_nama'] ?></font></td>
                	<td><font face="arial"><?= $row['alat_programBaru'] ?><br><?= $row['alat_tahap'] ?></font></td>
                	<td><font face="arial"><?= $row['tahun_tahun'] ?></td>
                	<td><font face="arial"><?= $row['alat_pegawai'] ?><br><?= $row['alat_jawatan'] ?></font></td>
                	<td style="text-align:left"><font face="arial"><?= $row['alat_lokasi'] ?></font></td>
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
				<td><font face="arial"><b>*</b><br>
			1 - JAPD <br>
			2 - JPPK / JTICT <br><br></font></td>

			<td><font face="arial"><b>**</b><br>
			1 - Staf Akademik <br>
			2 - Staf Pentadbiran <br>
			3 - Pelajar<br><br></font></td>

			<td><font face="arial"><b>***</b><br>
			1 - Tambahan kepada yang sedia ada <br>
			2 - Gantian bagi yang dilupuskan <br>
			3 - Permohonan baru<br><br></font></td>
			</tr>
		</table>
	</font>
</p>
