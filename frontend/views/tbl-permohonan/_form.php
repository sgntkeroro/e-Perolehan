<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\jui\JuiAsset;
use yii\web\JsExpression;
use kartik\file\FileInput;

use frontend\models\TblJk;
use frontend\models\TblJenisperuntukan;
use frontend\models\TblKatpelanggan;
use frontend\models\TblKatpermohonan;
use frontend\models\TblTahun;
use frontend\models\TblBukulog;
use frontend\models\TblDekan;
use frontend\models\TblKategori;
use frontend\models\TblSokongan;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPermohonan */
/* @var $form yii\widgets\ActiveForm */
?>

<style type="text/css">
    /*.textInput {
        height:25px;
        width: 75px;
        font-size: 11px; 
        padding: 1px 1px 1px 1px;    
    }*/

    /*.dropDown {
        height:25px;
        font-size: 11px; 
        padding: 1px 1px 1px 1px;    
    }

    .textArea {
        height: 75px;
        width: 150px;
        font-size: 11px; 
        padding: 1px 1px 1px 1px;    
    }

    textarea {
        resize: none;
        font-size: 11px; 
        padding: 1px 1px 1px 1px;
    }*/
</style>

<div class="tbl-permohonan-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data',
            'id' => 'dynamic-form'
        ]
    ]); ?>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'permohonan_pusatKos')->label("Pusat Kos :")->textInput(['maxlength' => true]) ?>
        </div>

        <div class = "col-lg-4">
            <?php //$form->field($model, 'kat_id')->label(true)->dropDownList(
                //ArrayHelper::map(TblKategori::find()->all(),'kat_id','kat_kategori'), ['id' => 'pilih_dulu']
            //) ?>

            <?= $form->field($model, 'kat_id')->label(true)->dropDownList(
              ArrayHelper::map(TblKategori::find()->all(),'kat_id','kat_kategori'),
              ['id' => 'pilih_dulu', 'onchange' => 'if($(this).val() == 1) {
                                $("#'.Html::getInputId($model, 'sok_id').'").val($(this).val());
                            }
                            else if($(this).val() == 2) {
                                $("#'.Html::getInputId($model, 'sok_id').'").val($(this).val());
                            }
                            else if($(this).val() == 3){
                                $("#'.Html::getInputId($model, 'sok_id').'").val(2);
                            }
           ']) ?>
        </div>

        <div class="col-lg-4">
            <?= $form->field($model, 'sok_id')->textInput() ?>
        </div>
    </div>

    <hr>

    <div id="panel-option-values table-responsive">
        <?php DynamicFormWidget::begin([
            'widgetContainer' => 'dynamicform_wrapper',
            'widgetBody' => '.form-options-body',
            'widgetItem' => '.form-options-item',
            'min' => 1,
            'insertButton' => '.add-item',
            'deleteButton' => '.delete-item',
            'model' => $modelsPeralatan[0],
            'formId' => 'dynamic-form',
            'formFields' => [
                'alat_nama',
                'alat_kodAkaun',
                'alat_kuantiti',
                'alat_hargaUnit',
                'jk_id',
                'katPelanggan_id',
                'alat_tujuan',
                'katPermohonan_id',
                'jen_id',
                'alat_programBaru',
                'alat_tahap',
                'tahunSedia_id',
                'alat_pegawai',
                'alat_jawatan',
                'alat_lokasi',
            ],
        ]); ?>

        <table class="table table-bordered table-striped">
            <tbody class="form-options-body">
                <?php foreach ($modelsPeralatan as $index => $modelPeralatan): ?>
                    <tr class="form-options-item">
                        <?= Html::activeHiddenInput($modelPeralatan, "[{$index}]alat_id"); ?>
                        <td><b>
                            <br><br>
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button><br><br>
                            <button type="button" class="delete-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </b></td>
                        <td>
                            <?= $form->field($modelPeralatan, "[{$index}]alat_nama")->label(true)->textArea(['rows'=>4, 'style' => 'width:200px']) ?>
                        </td>
                        <td>
                            <?= $form->field($modelPeralatan, "[{$index}]alat_kuantiti")->label(true)->textInput(['maxlength' => true, 'style' => 'width:100px']) ?>
                            <?= $form->field($modelPeralatan, "[{$index}]alat_hargaUnit")->label(true)->textInput(['maxlength' => true, 'style' => 'width:100px']) ?>
                        </td>
                        <td>
                            <?= $form->field($modelPeralatan, "[{$index}]alat_kodAkaun")->label(true)->textInput(['style' => 'width:150px']) ?>
                            <?= $form->field($modelPeralatan, "[{$index}]jk_id")->label(true)->dropDownList(
                                ArrayHelper::map(TblJk::find()->all(),'jk_id','jk_nama')
                            ) ?>
                        </td>
                        <td>
                            <?= $form->field($modelPeralatan, "[{$index}]katPelanggan_id")->label(true)->dropDownList(
                                ArrayHelper::map(TblKatpelanggan::find()->all(),'pelanggan_id','pelanggan_nama'), ['style' => 'width:150px']
                            ) ?>
                            <?= $form->field($modelPeralatan, "[{$index}]katPermohonan_id")->label(true)->dropDownList(
                                ArrayHelper::map(TblKatpermohonan::find()->all(),'katPermohonan_id','katPermohonan_nama'), ['style' => 'width:150px']
                            ) ?>
                        </td>
                        <td>
                            <?= $form->field($modelPeralatan, "[{$index}]jen_id")->label(true)->dropDownList(
                                ArrayHelper::map(TblJenisperuntukan::find()->all(),'jen_id','jen_nama'), ['style' => 'width:150px']
                            ) ?>
                            <?= $form->field($modelPeralatan, "[{$index}]tahunSedia_id")->label(true)->dropDownList(
                                ArrayHelper::map(TblTahun::find()->all(),'tahun_id','tahun_tahun'), ['style' => 'width:150px']
                            ) ?>
                        </td>
                        <td>
                            <?= $form->field($modelPeralatan, "[{$index}]alat_programBaru")->label(true)->textInput(['maxlength' => true, 'style' => 'width:150px']) ?>
                            <?= $form->field($modelPeralatan, "[{$index}]alat_tahap")->label(true)->textInput(['maxlength' => true, 'style' => 'width:150px']) ?>
                        </td>
                        <td>
                            <?= $form->field($modelPeralatan, "[{$index}]alat_pegawai")->label(true)->textInput(['maxlength' => true, 'style' => 'width:150px']) ?>
                            <?= $form->field($modelPeralatan, "[{$index}]alat_jawatan")->label(true)->textInput(['maxlength' => true, 'style' => 'width:150px']) ?>
                        </td>
                        <td>
                            <?= $form->field($modelPeralatan, "[{$index}]alat_tujuan")->label(true)->textArea(['rows'=>4, 'style' => 'width:150px']) ?>
                        </td>
                        <td>
                            <?= $form->field($modelPeralatan, "[{$index}]alat_lokasi")->label(true)->textArea(['rows'=>4, 'style' => 'width:150px']) ?>

                            <?= $this->render('_form_mesyuarat', [
                                'form' => $form,
                                'index' => $index,
                                'modelsMesyuarat' => $modelsMesyuarat[$index],
                            ]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php DynamicFormWidget::end(); ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Hantar' : 'Hantar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">
    $(".dynamicform_wrapper").on("beforeInsert", function(e, item) {
        console.log("beforeInsert");
    });

    $(".dynamicform_wrapper").on("afterInsert", function(e, item) {
        console.log("afterInsert");
    });

    $(".dynamicform_wrapper").on("beforeDelete", function(e, item) {
        if (! confirm("Are you sure you want to delete this item?")) {
            return false;
        }
        return true;
    });

    $(".dynamicform_wrapper").on("afterDelete", function(e) {
        console.log("Deleted item!");
    });

    $(".dynamicform_wrapper").on("limitReached", function(e, item) {
        alert("Limit reached");
    });
</script>

<?php
$script = <<< JS

$(document).ready(function () {
    $(document.body).on('change', '#kat_id', function () {
        var val = $('#kat_id').val();
        if(val = 1 ) {
          $('.1').hide();
        } else {
          $('.1').show();
        }
    });
});

JS;
$this->registerJs($script);
?>