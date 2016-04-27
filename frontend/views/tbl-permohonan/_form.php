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
use frontend\models\TblKatpelanggan;
use frontend\models\TblKatpermohonan;
use frontend\models\TblTahun;
use frontend\models\TblBukulog;
use frontend\models\TblDekan;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPermohonan */
/* @var $form yii\widgets\ActiveForm */
?>

<style type="text/css">
    .textInput {
        height:25px;
        width: 75px;
        font-size: 11px; 
        padding: 1px 1px 1px 1px;    
    }

    .dropDown {
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
    }
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
            <?= $form->field($model, 'permohonan_pusatKos')->label("Pusat Kos :")->textInput(['maxlength' => true, 'class' => "textInput"]) ?>
        </div>      
        <div class="col-sm-4">
            <?= $form->field($model, 'dekan_id')->label("Dekan / PTJ :")->dropDownList(
                ArrayHelper::map(TblDekan::find()->all(),'dekan_id','dekan_nama'), ['class' => "dropDown"]
            ) ?>
        </div>
    </div>

    <div id="panel-option-values" class="table-responsive" align="center">
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
                'alat_jenisPeruntukan',
                'alat_programBaru',
                'alat_tahap',
                'tahunSedia_id',
                'alat_pegawai',
                'alat_jawatan',
                'alat_lokasi',
                'alat_bukuLog'
            ],
        ]); ?>

        <table class="table table-bordered table-hover table-striped text-center" >
            <thead style="font-size: 11px;">
                <tr class="info">
                    <th class="required text-center">Peralatan</th>
                    <th class="required text-center">Kod Akaun</th>
                    <th class="required text-center">Kuantiti</th>
                    <th class="required text-center">Harga Seunit</th>
                    <th class="required text-center">Kelulusan Jawatankuasa</th>
                    <th class="required text-center">Kategori Pelanggan</th>
                    <th class="required text-center">Tujuan Pembelian</th>
                    <th class="required text-center">Kategori Permohonan</th>
                    <th class="required text-center">Jenis Peruntukan</th>
                    <th class="required text-center">Program Baru & tahap Pengajian</th>
                    <th class="required text-center">Tahun Disediakan</th>
                    <th class="required text-center">Nama & Jawatan Pegawai Bertanggungjawab</th>
                    <th class="required text-center">Lokasi Cadangan</th>
                    <th class="text-center" style="width: 188px;">Buku Log</th>
                    <th class="text-center" style="width: 90px; text-align: center">Actions</th>
                </tr>
            </thead>
            <tbody class="form-options-body">
                <?php foreach ($modelsPeralatan as $index => $modelPeralatan): ?>
                    <tr class="form-options-item">
                        <?= Html::activeHiddenInput($modelPeralatan, "[{$index}]alat_id"); ?>
                        <td>
                            <?= $form->field($modelPeralatan, "[{$index}]alat_nama")->label(false)->textArea(['rows'=>6, 'cols'=>50, 'class' => "textArea"]) ?>
                        </td>
                        <td>
                            <?= $form->field($modelPeralatan, "[{$index}]alat_kodAkaun")->label(false)->textInput(['class' => "textInput"]) ?>
                        </td>
                        <td>
                            <?= $form->field($modelPeralatan, "[{$index}]alat_kuantiti")->label(false)->textInput(['maxlength' => true, 'class' => "textInput"]) ?>
                        </td>
                        <td>
                            <?= $form->field($modelPeralatan, "[{$index}]alat_hargaUnit")->label(false)->textInput(['maxlength' => true, 'class' => "textInput"]) ?>
                        </td>
                        <td>
                             <?= $form->field($modelPeralatan, "[{$index}]jk_id")->label(false)->dropDownList(
                                ArrayHelper::map(TblJk::find()->all(),'jk_id','jk_nama'), ['class' => "dropDown"]
                            ) ?>
                        </td>
                        <td>
                            <?= $form->field($modelPeralatan, "[{$index}]katPelanggan_id")->label(false)->dropDownList(
                                ArrayHelper::map(TblKatpelanggan::find()->all(),'pelanggan_id','pelanggan_nama'), ['class' => "dropDown"]
                            ) ?>
                        </td>
                        <td>
                            <?= $form->field($modelPeralatan, "[{$index}]alat_tujuan")->label(false)->textArea(['maxlength' => true, 'class' => "textArea"]) ?>
                        </td>
                        <td>
                            <?= $form->field($modelPeralatan, "[{$index}]katPermohonan_id")->label(false)->dropDownList(
                                ArrayHelper::map(TblKatpermohonan::find()->all(),'katPermohonan_id','katPermohonan_nama'), ['class' => "dropDown"]
                            ) ?>
                        </td>
                        <td>
                            <?= $form->field($modelPeralatan, "[{$index}]alat_jenisPeruntukan")->label(false)->textInput(['maxlength' => true, 'class' => "textInput"]) ?>
                        </td>
                        <td>
                            <?= $form->field($modelPeralatan, "[{$index}]alat_programBaru")->label(false)->textInput(['maxlength' => true, 'class' => "textInput"]) ?>
                            <?= $form->field($modelPeralatan, "[{$index}]alat_tahap")->label(false)->textInput(['maxlength' => true, 'class' => "textInput"]) ?>
                        </td>
                        <td>
                            <?= $form->field($modelPeralatan, "[{$index}]tahunSedia_id")->label(false)->dropDownList(
                                ArrayHelper::map(TblTahun::find()->all(),'tahun_id','tahun_tahun'), ['class' => "dropDown"]
                            ) ?>
                        </td>
                        <td>
                            <?= $form->field($modelPeralatan, "[{$index}]alat_pegawai")->label(false)->textInput(['maxlength' => true, 'class' => "textInput"]) ?>
                            <?= $form->field($modelPeralatan, "[{$index}]alat_jawatan")->label(false)->textInput(['maxlength' => true, 'class' => "textInput"]) ?>
                        </td>
                        <td>
                            <?= $form->field($modelPeralatan, "[{$index}]alat_lokasi")->label(false)->textArea(['maxlength' => true, 'class' => "textArea"]) ?>
                        </td>
                        <td>
                            <?php if (!$modelPeralatan->isNewRecord): ?>
                                <?= Html::activeHiddenInput($modelPeralatan, "[{$index}]bukuLog_id"); ?>
                                <?= Html::activeHiddenInput($modelPeralatan, "[{$index}]deleteBukuLog"); ?>
                            <?php endif; ?>
                             <?php
                                $modelBukuLog = TblBukulog::findOne(['bukulog_id' => $modelPeralatan->bukuLog_id]);
                                $initialPreview = [];
                                if ($modelBukuLog) {
                                    $pathImg = Yii::$app->fileStorage->baseUrl . '/web/uploads' . $modelBukuLog->bukulog_path;
                                    $initialPreview[] = Html::alat_bukuLog($pathImg, ['class' => 'file-preview-image']);
                                }
                            ?>
                            <?= $form->field($modelPeralatan, "[{$index}]alat_bukuLog")->label(false)->widget(FileInput::classname(), [

                                'options' => [
                                    'multiple' => true,
                                    'accept' => 'image/*',
                                    'class' => 'optionvalue-img'
                                ],
                                'pluginOptions' => [
                                    'previewFileType' => 'image',
                                    'showCaption' => false,
                                    'showUpload' => false,
                                    'browseClass' => 'btn btn-default btn-sm',
                                    'browseLabel' => ' ',
                                    'browseIcon' => '<i class="glyphicon glyphicon-book"></i>',
                                    'removeClass' => 'btn btn-danger btn-sm',
                                    'removeLabel' => ' Delete',
                                    'removeIcon' => '<i class="fa fa-trash"></i>',
                                    'previewSettings' => [
                                        'image' => ['width' => '138px', 'height' => 'auto']
                                    ],
                                    'initialPreview' => $initialPreview,
                                    'layoutTemplates' => ['footer' => '']
                                ]
                            ]) ?>
                            
                            <?= $this->render('_form_mesyuarat', [
                                'form' => $form,
                                'index' => $index,
                                'modelsMesyuarat' => $modelsMesyuarat[$index],
                            ]) ?>
                        </td>
                        <td class="text-center vcenter">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button><br><br>
                            <button type="button" class="delete-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
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

<?php
// $js = <<<'EOD'

// $(".optionvalue-img").on("filecleared", function(event) {
//     var regexID = /^(.+?)([-\d-]{1,})(.+)$/i;
//     var id = event.target.id;
//     var matches = id.match(regexID);
//     if (matches && matches.length === 4) {
//         var identifiers = matches[2].split("-");
//         $("#optionvalue-" + identifiers[1] + "-deleteimg").val("1");
//     }
// });

// EOD;

// JuiAsset::register($this);
// $this->registerJs($js);
?>

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

$js = <<<'EOD'

$(".optionvalue-img").on("filecleared", function(event) {
    var regexID = /^(.+?)([-\d-]{1,})(.+)$/i;
    var id = event.target.id;
    var matches = id.match(regexID);
    if (matches && matches.length === 4) {
        var identifiers = matches[2].split("-");
        $("#optionvalue-" + identifiers[1] + "-deleteimg").val("1");
    }
});

EOD;

JuiAsset::register($this);
$this->registerJs($js);
?>