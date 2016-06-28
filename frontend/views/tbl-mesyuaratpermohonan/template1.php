<?php
use yii\helpers\Html;
use yii\db\Query;
use yii\db\Command;
use frontend\models\TblPermohonan;
use frontend\models\TblModerator;
use frontend\models\TblBhgnmod;
use frontend\models\TblBahagian;
use frontend\models\TblUnit;

$permohonan = TblPermohonan::find()->where(['permohonan_id' => $model->permohonan_id])->one();
$moderator = TblModerator::find()->where(['user_id' => $permohonan->user_id])->one();
$bm = TblBhgnmod::find()->where(['bm_id' => $moderator->bm_id])->one();
$bhgn = TblBahagian::find()->where(['bahagian_id' => $bm->bahagian_id])->one();
$unit = TblUnit::find()->where(['unit_id' => $bm->unit_id])->one();

$nombor = 1;
?>

<style type="text/css">
	table
        {
          width: 100%;
          border-left: 2px solid;
          border-top: 2px solid;
           
          border-spacing:0;
          border-collapse: collapse; 

          counter-reset: rowNumber;             
        }

    table td 
        {
            border-right: 2px solid;
            border-bottom: 2px solid;
            padding: 2mm;
        }        
</style>

<div style="page-break-inside: avoid">

<p style="font-size:18px" align=center> 
	<font face="arial">
		<u><b>
			Senarai Permohonan 
            <?= $bhgn->bahagian_nama ?>,
            <?= $unit->unit_nama ?>,
            <?= $bm->unit_kampuscawangan ?>.
		<br>
		Mesyuarat Permohonan Peruntukan Kumpulan Wang Pendapatan (KY) <?= date(Y) ?> Bagi 
			<?= $bhgn->bahagian_nama ?>,
      <?= $unit->unit_nama ?>,
      <?= $bm->unit_kampuscawangan ?>.
	</b></u>
    </font>
</p>

<p align=center width=100%>
	<font face="arial">
			<table style="font-size:17px; face:arial; text-align:center">
        <tr style="background-color:grey">
          <td style="width:5%"><b>Bil</b></td>
          <td style="width:5%"><b>PUSAT<br>KOS</b></td>
          <td style="width:10%"><b>BAHAGIAN /<br>CAWANGAN</b></td>
          <td style="width:20%"><b>PERMOHONAN</b></td>
          <td style="width:10%"><b>KUANTITI</b></td>
          <td style="width:10%"><b>HARGA<br>SEUNIT<br>(RM)</b></td>
          <td style="width:10%"><b>PERMOHONAN<br>DARIPADA PTJ<br>(RM)</b></td>
          <td style="width:10%"><b>KUANTITI<br>DILULUSKAN</b></td>
          <td style="width:10%"><b>JUMLAH<br>DILULUSKAN<br>(RM)</b></td>
          <td style="width:15%"><b>CATITAN</b></td>
        </tr>
        <tr>
          <td style="border-bottom: 0px solid;"></td>
          <td style="border-bottom: 0px solid;">
            <?php foreach ($viewUnit as $bahagian): ?>
              <b><?= $bahagian['permohonan_pusatKos'] ?></b>
            <?php endforeach; ?>
          </td>
          <td style="border-bottom: 0px solid; text-align:left">
            <b><?= $bhgn->bahagian_nama ?>,
            <?= $unit->unit_nama ?>,
            <?= $bm->unit_kampuscawangan ?>.</b>
          </td>
          <td style="border-bottom: 0px solid; text-align:left">
            <?php foreach ($view as $row): ?>
            <?= $row['alat_nama'] ?><br><br>
            <?php endforeach; ?>
          </td>
          <td style="border-bottom: 0px solid;">
            <?php foreach ($view as $kuantiti): ?>
            <?= $kuantiti['alat_kuantiti'] ?><br><br>
            <?php endforeach; ?>
          </td>
          <td style="border-bottom: 0px solid;">
            <?php foreach ($view as $hargaseunit): ?>
            <?= $hargaseunit['alat_hargaUnit'] ?><br><br>
            <?php endforeach; ?>
          </td>
          <td>
            <?php foreach ($view as $jumlah): ?>
            <?= $jumlah['alat_jumlahHarga'] ?><br><br>
            <?php endforeach; ?>
          </td>
          <td style="border-bottom: 0px solid;"></td>
          <td style="border-bottom: 0px solid;"></td>
          <td style="border-bottom: 0px solid;"></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td>
            <b>Jumlah Keseluruhan</b>
          </td>
          <td>
          </td>
          <td>
          </td>
          <td>
            <b><?= $sum ?></b>
          </td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </table>
	</font>
</p>

</div>