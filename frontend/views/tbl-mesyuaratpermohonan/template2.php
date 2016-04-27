<?php
    use yii\helpers\Html;
    use yii\db\Query;
    use yii\db\Command;
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

  <p style="font-size:14px" align=center> 
      <font face="arial">
          <b>PERMOHONAN BAJET PERALATAN / PROJEK BAGI TAHUN <?= date(Y) ?> (BAJET PENGURUSAN DAN AMANAH)
          <br>MESYUARAT BAJET PERALATAN PADA <?= $model->mesyPerm_tarikh ?></b>
      </font>
  </p>

  <p align=center width=100%>
      <font face="arial">
              <table style="font-size:12px; face:arial; text-align:center">
          <tr style="background-color:grey">
              <td style="width:4%"><b>Bil</b></td>
              <td style="width:6%"><b>PUSAT<br>KOS</b></td>
              <td style="width:10%"><b>BAHAGIAN /<br>CAWANGAN</b></td>
              <td style="width:22%"><b>PERMOHONAN</b></td>
              <td style="width:8%"><b>KUANTITI</b></td>
              <td style="width:10%"><b>HARGA<br>SEUNIT<br>(RM)</b></td>
              <td style="width:12%"><b>PERMOHONAN<br>DARIPADA PTJ<br>(RM)</b></td>
              <td style="width:8%"><b>KUANTITI</b></td>
              <td style="width:10%"><b>JUMLAH<br>DILULUSKAN<br>(RM)</b></td>
              <td style="width:15%"><b>CATITAN</b></td>
          </tr>
          <tr>
              <td style="border-bottom: 0px solid;"></td>
              <td style="border-bottom: 0px solid;">
              <?php foreach ($viewUnit as $pusatKos): ?>
                  <b><?= $pusatKos['permohonan_pusatKos'] ?></b>
              <?php endforeach; ?>
            </td>
            <td style="border-bottom: 0px solid; text-align:left">
              <?php foreach ($viewUnit as $unit): ?>
                  <b><?= $unit['unit'] ?></b>
              <?php endforeach; ?>
            </td>
            <td style="border-bottom: 0px solid; text-align:left">
                  <?php foreach ($view as $alatNama): ?>
                  <?= $alatNama['alat_nama'] ?><br><br>
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
            <td style="border-bottom: 0px solid;">
                  <?php foreach ($view as $mesyKuantiti): ?>
                  <?= $mesyKuantiti['mesy_kuantiti'] ?><br><br>
                  <?php endforeach; ?>
            </td>
            <td>
                  <?php foreach ($view as $mesyJumlah): ?>
                  <?= $mesyJumlah['mesy_jumlahHarga'] ?><br><br>
                  <?php endforeach; ?>
            </td>
            <td style="border-bottom: 0px solid;">
                  <?php foreach ($view as $mesyCatitan): ?>
                  <?= $mesyCatitan['mesy_catitan'] ?><br><br>
                  <?php endforeach; ?>
            </td>
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
                  <b>Jumlah</b>
              </td>
              <td></td>
              <td>
                  <b>Jumlah</b>
              </td>
              <td></td>
          </tr>
        </table>
      </font>
  </p>
</div>

<div>
  <p style="font-size:14px"> 
      <font face="arial">
          <br><br><br><b>Disahkan oleh :<br><br><br><br><br>
          PROF. IR. DR. HJ. ABDUL RAHMAN OMAR, JSM</b><br>
          Timbalan Naib Canselor (Penyelidikan & Inovasi)
      </font>
  </p>
</div>