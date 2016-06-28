<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblMesyuaratpermohonan */

$this->title = $model->mesyPerm_id;
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
          <?= Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', ['update', 'id' => $model->mesyPerm_id], [
          'class' => 'btn btn-success btn-sm',
          'data-toggle'=>'tooltip', 
          'title'=>'Kemaskini Permohonan']) ?>

          <?= Html::a('<span class="glyphicon glyphicon-file" aria-hidden="true"></span>', ['template1', 'id' => $model->mesyPerm_id], [
              'class' => 'btn btn-info btn-sm',
              'target'=>'_blank', 
              'data-toggle'=>'tooltip', 
              'title'=>'Template sebelum mesyuarat'
          ]); ?>

          <?= Html::a('<span class="glyphicon glyphicon-file" aria-hidden="true"></span>', ['template2', 'id' => $model->mesyPerm_id], [
              'class' => 'btn btn-info btn-sm',
              'target'=>'_blank', 
              'data-toggle'=>'tooltip', 
              'title'=>'Template selepas mesyuarat dikemaskini'
          ]); ?>

          <?= Html::a('<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>', ['pdf', 'id' => $model->mesyPerm_id], [
              'class' => 'btn btn-warning btn-sm',
              'target'=>'_blank', 
              'data-toggle'=>'tooltip', 
              'title'=>'Butiran Permohonan'
          ]); ?>

            <p>
                <!-- Table -->
                <table class="table">
                    <thead>
                        <th>No. Permohonan</th>
                        <th>Tarikh</th>
                        <th>Status</th>
                        <th>Catitan</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $model->permohonan_id ?></td>
                            <td><?= $model->mesyPerm_tarikh ?></td>
                            <td><?= $statusMesyuarat->statMesyua_status ?></td>
                            <td><?= $model->mesyPerm_catitan ?></td>
                        </tr>
                    </tbody>
                </table>
            </p>
        </div>
    </div>

    <div class="panel panel-info" style="width:99%;">
        <div class="panel-heading"><h4><b>JADUAL PERALATAN</b></h4></div>
        <div class="panel-body">
            <p align=center width=100%>
      <font face="arial">
              <table style="font-size:12px; face:arial; text-align:center">
          <tr style="background-color:grey; text-align:left">
              <td style="width:6%; background-color:#FFC125;"><b>PUSAT<br>KOS</b></td>
              <td style="width:10%; background-color:#FFC125;"><b>BAHAGIAN /<br>CAWANGAN</b></td>
              <td style="width:22%; background-color:#7CFC00;"><b>PERMOHONAN</b></td>
              <td style="width:8%; background-color:#7CFC00;"><b>KUANTITI</b></td>
              <td style="width:10%; background-color:#7CFC00;"><b>HARGA<br>SEUNIT<br>(RM)</b></td>
              <td style="width:12%; background-color:#7CFC00;"><b>PERMOHONAN<br>DARIPADA PTJ<br>(RM)</b></td>
              <td style="width:8%; background-color:#00BFFF;"><b>KUANTITI</b></td>
              <td style="width:10%; background-color:#00BFFF;"><b>JUMLAH<br>DILULUSKAN<br>(RM)</b></td>
              <td style="width:15%; background-color:#00BFFF;"><b>CATITAN</b></td>
          </tr>
          <tr style="text-align:left">
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
                  <?php $nombor = $nombor; foreach ($view as $alatNama): ?>
                  <?= $nombor++ ?> .  <?= $alatNama['alat_nama'] ?><br><br>
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
          <tr style="text-align:left">
              <td></td>
              <td></td>
              <td style="background-color:#FF3E96;">
                  <b>Jumlah Keseluruhan</b>
              </td>
              <td>
              </td>
              <td>
              </td>
              <td style="background-color:#FF3E96;">
                  <b><?= $sumPermohonan ?></b>
              </td>
              <td></td>
              <td style="background-color:#FF3E96;">
                  <b><?= $sumMesyuarat ?></b>
              </td>
              <td></td>
          </tr>
        </table>
      </font>
  </p>
        </div>
    </div>
</div>
