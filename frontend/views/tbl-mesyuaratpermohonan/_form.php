
<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use frontend\models\TblStatmesyua;
use frontend\models\TblStatus;

use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\jui\JuiAsset;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPermohonan */
/* @var $form yii\widgets\ActiveForm */
?>

<style type="text/css">
    .textInput {
        height:20px;
        font-size: 11px; 
        padding: 1px 1px 1px 1px;    
    } 

    table thead {
        height: 70px;
    }

    .tr {
        height: 100px;
    }
</style>

<div class="tbl-permohonan-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data',
            'id' => 'dynamic-form'
        ]
    ]); ?>

    <div class = "panel panel-primary">
        <div class = "panel-heading" style = "text-align:center"><h4><b>BUTIRAN MESYUARAT</b></h4>
        </div>
        <div class = "panel-body">
            <div class="col-sm-4">
                <?= $form->field($model, 'statMesyua_id')->dropDownList(
                    ArrayHelper::map(TblStatmesyua::find()->all(),'statMesyua_id','statMesyua_status')
                ) ?>
            </div>
            <div class="col-sm-4">
                <?= $form->field($modelsPermohonan, 'status_id')->dropDownList(
                    ArrayHelper::map(TblStatus::find()->all(),'status_id','status_status')
                ) ?>
            </div>
            <div class="col-sm-4">
                <?= $form->field($model, 'mesyPerm_tarikh')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'pilih tarikh mesyuarat'],
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'autoclose'=>true
                    ]
                ]); ?>
            </div>
            <div class="col-sm-4">
                <?= $form->field($model, 'mesyPerm_catitan')->textArea(['rows' => 2]) ?>
            </div>
        </div>
    </div>
    <div class = "panel panel-primary">
        <div class = "panel-heading" style = "text-align:center">
            <h4><b>JADUAL PERALATAN</b></h4>
        </div>
        <div class = "panel-body">
            <div class="row">
                <div class="col-md-7">
                    <table class = "table table-striped table-hover">
                        <thead style = "background-color:#7CFC00">
                            <th class="text-left">Permohonan</th>
                            <th class="text-center">Kuantiti</th>
                            <th class="text-center">Harga Seunit</th>
                            <th class="text-center">PTJ</th>
                        </thead>
                        <tbody>
                            <?php $nombor = 1; $nombor = $nombor; foreach ($view as $alat_nama): ?>
                            <tr class = "tr">
                                <td><?= $nombor++ ?> . <?= $alat_nama['alat_nama'] ?></td> 
                                <td class="text-center"><?= $alat_nama['alat_kuantiti'] ?></td> 
                                <td class="text-center"><?= $alat_nama['alat_hargaUnit'] ?></td> 
                                <td class="text-center"><?= $alat_nama['alat_jumlahHarga'] ?></td>                     
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-5">
                    <table class = "table table-striped table-hover">
                        <thead style = "background-color:#7CFC00">
                            <th class="text-center">Kuantiti</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Catitan</th>
                        </thead>
                        <?php DynamicFormWidget::begin([
                            'widgetContainer' => 'dynamicform_wrapper',
                            'widgetBody' => '.form-options-body',
                            'widgetItem' => '.form-options-item',
                            'min' => 1,
                            'insertButton' => '.add-item',
                            'deleteButton' => '.delete-item',
                            'model' => $modelsAlatmesyuarat[0],
                            'formId' => 'dynamic-form',
                            'formFields' => [
                                'mesy_kuantiti',
                                'mesy_jumlahHarga',
                                'mesy_catitan'
                            ],
                        ]); ?>
                        <tbody class="form-options-body">
                            <?php foreach ($modelsAlatmesyuarat as $index => $modelAlatmesyuarat): ?>
                                <tr class="form-options-item tr">
                                    <td>
                                        <?= $form->field($modelAlatmesyuarat, "[{$index}]mesy_kuantiti")->label(false)->textInput(['maxlength' => true, 'style' => 'text-align:center']) ?>
                                    </td>
                                    <td>
                                        <?= $form->field($modelAlatmesyuarat, "[{$index}]mesy_jumlahHarga")->label(false)->textInput(['maxlength' => true, 'style' => 'text-align:center']) ?>
                                    </td>
                                    <td>
                                        <?= $form->field($modelAlatmesyuarat, "[{$index}]mesy_catitan")->label(false)->textArea(['rows' => 2]) ?>
                                    </td>
                                    <?php if (!$modelAlatmesyuarat->isNewRecord): ?>
                                        <?= Html::activeHiddenInput($modelAlatmesyuarat, "[{$index}]mesy_id"); ?>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <?php DynamicFormWidget::end(); ?>
                    </table>
                </div>
            </div>
        </div>
    </div>    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Hantar' : 'Hantar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>