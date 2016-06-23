<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\MinButiran */

$this->title = $model->minit_bil;
$this->params['breadcrumbs'][] = ['label' => 'Senarai Minit Mesyuarat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
    .table {
        width: 100%;
        border-left: 1px solid;
        border-top: 1px solid;
           
        border-spacing:0;
        border-collapse: collapse;
        /*border : 1px solid;
        padding : 3px;
        border-left: thin solid;
        border-right: thin solid;
        border-bottom: thin solid #000000;
        border-top: thin solid;*/
        /*border-left: 1px solid;*/
        /*border-top: 1px solid;*/
        /*border-right: 1px solid;*/
        /*border-bottom: 1px solid;*/
    }

    .td 
        {
            border-right: 1px solid;
            border-bottom: 1px solid;
            padding: 2mm;
        }

    .noborder {
        padding : 3px;
    }
</style>

<div>
    <p style = "text-align:center; font-size:14px">
        <font face = "arial" ><b>
            MINIT MESYUARAT <?= strtoupper($model->minit_bil) ?><br>
            JAWATANKUASA BAJET PERALATAN UITM
        </b></font>
    </p>
    <hr>
    <table class = "noborder" style = "text-align:left; font-size:12px">
        <tbody>
            <tr>
                <td><font face = "arial" ><b>Tarikh</b></font></td>
                <td><font face = "arial" ><b> : </b></font></td>
                <td><font face = "arial" ><b><?= $model->minit_tarikh ?></b></font></td>
            </tr>
            <tr>
                <td><font face = "arial" ><b>Masa</b></font></td>
                <td><font face = "arial" ><b> : </b></font></td>
                <td><font face = "arial" ><b><?= $model->minit_masa ?></b></font></td>
            </tr>
            <tr>
                <td><font face = "arial" ><b>Tempat</b></font></td>
                <td><font face = "arial" ><b> : </b></font></td>
                <td><font face = "arial" ><b><?= nl2br($model->minit_tempat)?></b></font></td>
            </tr>
        </tbody>
    </table>
</div>
    <hr>
    <font face = "arial" style = "text-align:left; font-size:12px"><u><b>KEHADIRAN :</b></u></font><br><br>
    <table class = "noborder" style = "width:100%; text-align:left; font-size:12px">
        <tbody>
            <?php $nombor = $nombor; foreach ($modelsHadir as $modelsHadir): ?>                                
            <tr>
                <td><font face = "arial" >
                    <?= $nombor++; ?> . 
                </font></td>
                <td><font face = "arial" >
                    <?= nl2br($modelsHadir['hadir_nama']) ?>
                </font></td>
                <td><font face = "arial" >
                    <?= nl2br($modelsHadir['hadir_peranan']) ?>
                </font></td>
            </tr>
            <tr>
                <td><font face = "arial" >
                <br><br></font></td>
                <td><font face = "arial" >
                    <?= nl2br($modelsHadir['hadir_jawatan']) ?>
                <br><br></font></td>
                <td><font face = "arial" >
                <br><br></font></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <pagebreak />

    <table class = "table" style = "width:100%; text-align:left;">
        <tr>
            <td class = "td"><b><font face = "arial">BIL</font></b></td>
            <td class = "td"><b><font face = "arial">PERKARA</font></b></td>
            <td class = "td"><b><font face = "arial">TINDAKAN / MAKLUMAN</font></b></td>
        </tr>
        <?php foreach ($modelsPerkara as $modelsPerkara): ?>
        <tr>
            <td class = "td"><b><font face = "arial" size = "12px">
                <?= nl2br($modelsPerkara['perkara_bil']) ?>
            </font></b></td>
            <td class = "td" style = "text-align:justify;"><b><font face = "arial">
                <?= nl2br($modelsPerkara['perkara_tajuk']) ?>
            </font></b></td>
            <td class = "td"></td>
        </tr>
        <tr>
            <td class = "td"></td>
            <td class = "td" style = "text-align:justify;"><font face = "arial">
                <?= nl2br($modelsPerkara['perkara_isi']) ?>
            </font></td>
            <td class = "td"><font face = "arial">
                <?= nl2br($modelsPerkara['perkara_maklumat']) ?>
            </font></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <div style = "width:100%; text-align:justify; font-size:12px">
        <font face = "arial"><?= nl2br($model->minit_notakaki)?></font>
    </div><br><br>

    <table class = "table" style = "width:100%; text-align:left; font-size:12px">
        <tr>
            <td class = "td" style = "width:50%;"><font face = "arial">
                Disediakan oleh :<br><br><br>
                ..................................................<br>
                PN HAJAH SADIYAH ALIMON<br>
                Timbalan Pendaftar Kanan<br>
                Merangkap Setiausaha<br>
                Tarikh :
            </font></td>
            <td class = "td" style = "width:50%;"><font face = "arial">
                Diluluskan tertakluk kepada pindaan oleh :<br><br><br>
                ..........................................................................<br>
                PROF. IR. DR. ABDUL RAHMAN OMAR, JSM<br>
                Naib Canselor ( Penyelidikan dan Inovasi )<br>
                Merangkap Pengerusi<br>
                Tarikh :
            </font></td>
        </tr>
    </table>
