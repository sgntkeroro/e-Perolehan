<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\JuiAsset;
use yii\web\JsExpression;
use kartik\file\FileInput;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;

use frontend\models\TblJk;
use frontend\models\TblKatpelanggan;
use frontend\models\TblKatpermohonan;
use frontend\models\TblTahun;
use frontend\models\TblBukulog;
?>

<div id="panel-option-values">

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

    <table class="table-bordered">
        <thead style="font-size: 11px;">
            <tr>
                <th class="required">Peralatan</th>
                <th class="required">Kod Akaun</th>
                <th class="required">Kuantiti</th>
                <th class="required">Harga Seunit</th>
                <th class="required">Kelulusan Jawatankuasa</th>
                <th class="required">Kategori Pelanggan</th>
                <th class="required">Tujuan Pembelian</th>
                <th class="required">Kategori Permohonan</th>
                <th class="required">Jenis Peruntukan</th>
                <th class="required">Program Baru & tahap Pengajian</th>
                <th class="required">Tahun Disediakan</th>
                <th class="required">Nama & Jawatan Pegawai Bertanggungjawab</th>
                <th class="required">Lokasi Cadangan</th>
                <th style="width: 188px;">Buku Log</th>
                <th style="width: 90px; text-align: center">Actions</th>
            </tr>
        </thead>
        <tbody class="form-options-body">
            <?php foreach ($modelsPeralatan as $index => $modelPeralatan): ?>
                <tr class="form-options-item">
                    <td>
                        <?= $form->field($modelPeralatan, "[{$index}]alat_nama")->label(false)->textInput(['maxlength' => true]) ?>
                    </td>
                    <td>
                        <?= $form->field($modelPeralatan, "[{$index}]alat_kodAkaun")->label(false)->textInput(['maxlength' => true]) ?>
                    </td>
                    <td>
                        <?= $form->field($modelPeralatan, "[{$index}]alat_kuantiti")->label(false)->textInput(['maxlength' => true]) ?>
                    </td>
                    <td>
                        <?= $form->field($modelPeralatan, "[{$index}]alat_hargaUnit")->label(false)->textInput(['maxlength' => true]) ?>
                    </td>
                    <td>
                         <?= $form->field($modelPeralatan, "[{$index}]jk_id")->label(false)->dropDownList(
                            ArrayHelper::map(TblJk::find()->all(),'jk_id','jk_nama')
                        ) ?>
                    </td>
                    <td>
                        <?= $form->field($modelPeralatan, "[{$index}]katPelanggan_id")->label(false)->dropDownList(
                            ArrayHelper::map(TblKatpelanggan::find()->all(),'pelanggan_id','pelanggan_nama')
                        ) ?>
                    </td>
                    <td>
                        <?= $form->field($modelPeralatan, "[{$index}]alat_tujuan")->label(false)->textInput(['maxlength' => true]) ?>
                    </td>
                    <td>
                        <?= $form->field($modelPeralatan, "[{$index}]katPermohonan_id")->label(false)->dropDownList(
                            ArrayHelper::map(TblKatpermohonan::find()->all(),'katPermohonan_id','katPermohonan_nama')
                        ) ?>
                    </td>
                    <td>
                        <?= $form->field($modelPeralatan, "[{$index}]alat_jenisPeruntukan")->label(false)->textInput(['maxlength' => true]) ?>
                    </td>
                    <td>
                        <?= $form->field($modelPeralatan, "[{$index}]alat_programBaru")->label(false)->textInput(['maxlength' => true]) ?>
                        <?= $form->field($modelPeralatan, "[{$index}]alat_tahap")->label(false)->textInput(['maxlength' => true]) ?>
                    </td>
                    <td>
                        <?= $form->field($modelPeralatan, "[{$index}]tahunSedia_id")->label(false)->dropDownList(
                            ArrayHelper::map(TblTahun::find()->all(),'tahun_id','tahun_tahun')
                        ) ?>
                    </td>
                    <td>
                        <?= $form->field($modelPeralatan, "[{$index}]alat_pegawai")->label(false)->textInput(['maxlength' => true]) ?>
                        <?= $form->field($modelPeralatan, "[{$index}]alat_jawatan")->label(false)->textInput(['maxlength' => true]) ?>
                    </td>
                    <td>
                        <?= $form->field($modelPeralatan, "[{$index}]alat_lokasi")->label(false)->textInput(['maxlength' => true]) ?>
                    </td>
                    <td>
                        <?php if (!$modelPeralatan->isNewRecord): ?>
                            <?= Html::activeHiddenInput($modelPeralatan, "[{$index}]alat_id"); ?>
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
                                'multiple' => false,
                                'accept' => 'image/*',
                                'class' => 'optionvalue-img'
                            ],
                            'pluginOptions' => [
                                'previewFileType' => 'image',
                                'showCaption' => false,
                                'showUpload' => false,
                                'browseClass' => 'btn btn-default btn-sm',
                                'browseLabel' => ' Pick image',
                                'browseIcon' => '<i class="glyphicon glyphicon-picture"></i>',
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

                    </td>
                    <td class="text-center vcenter">
                        <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                        <button type="button" class="delete-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php DynamicFormWidget::end(); ?>
</div>

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