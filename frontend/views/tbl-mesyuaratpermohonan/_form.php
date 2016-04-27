
<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
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
</style>

<div class="tbl-permohonan-form textInput">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data',
            'id' => 'dynamic-form'
        ]
    ]); ?>

    <div class="row">
        <div class="col-sm-2">
            <?= $form->field($model, 'statMesyua_id')->textInput(['value'=>Yii::$app->user->identity->id, 'readonly' => true, 'class' => "textInput"]) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'mesyPerm_tarikh')->textInput(['value'=>date('Y-m-d'), 'readonly' => true, 'class' => "textInput"]) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'mesyPerm_catitan')->textInput(['maxlength' => true, 'class' => "textInput"]) ?>
        </div>
    </div>

    <div id="panel-option-values">
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

        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped text-center"  style="float: left; width: 59%;">
                <thead style="font-size: 11px;">
                    <tr class="info">
                        <th class="required text-center">Bahagian / Cawangan</th>
                        <th class="required text-center">Permohonan</th>
                        <th class="required text-center">Kuantiti</th>
                        <th class="required text-center">Harga Seunit</th>
                        <th class="required text-center">Permohonan Daripada PTJ</th>
                    </tr>
                </thead>
                <tbody class="form-options-body">                                        
                        <tr class="form-options-item">
                            <td>
                                <?php foreach ($viewbahagian as $bahagian): ?>
                                <?= $bahagian['bahagian_nama'] ?>
                                <?php endforeach; ?>
                            </td>
                            <td align="left">
                                <?php foreach ($view as $alat_nama): ?>
                                <?= $alat_nama['alat_nama'] ?><br><br>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <?php foreach ($view as $alat_kuantiti): ?>
                                <?= $alat_kuantiti['alat_kuantiti'] ?><br><br>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <?php foreach ($view as $alat_hargaUnit): ?>
                                <?= $alat_hargaUnit['alat_hargaUnit'] ?><br><br>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <?php foreach ($view as $alat_jumlahHarga): ?>
                                <?= $alat_jumlahHarga['alat_jumlahHarga'] ?><br><br>
                                <?php endforeach; ?>
                            </td>
                        </tr>                    
                </tbody>
            </table>

            <table class="table table-bordered table-hover table-striped text-center"  style="float: right; width: 25%;">
            <thead style="font-size: 11px;">
                <tr class="info">                                        
                        <th class="required text-center">Kuantiti<br>Diluluskan</th>
                        <th class="required text-center">Jumlah<br>Diluluskan</th>
                        <th class="required text-center">Catitan</th>
                </tr>
            </thead>
            <tbody class="form-options-body">
                <?php foreach ($modelsAlatmesyuarat as $index => $modelAlatmesyuarat): ?>
                    <tr class="form-options-item">
                        <td>
                            <?= $form->field($modelAlatmesyuarat, "[{$index}]mesy_kuantiti")->label(false)->textInput(['maxlength' => true, 'class' => "textInput"]) ?>
                        </td>
                        <td>
                            <?= $form->field($modelAlatmesyuarat, "[{$index}]mesy_jumlahHarga")->label(false)->textInput(['maxlength' => true, 'class' => "textInput"]) ?>
                        </td>
                        <td>
                            <?= $form->field($modelAlatmesyuarat, "[{$index}]mesy_catitan")->label(false)->textInput(['maxlength' => true, 'class' => "textInput"]) ?>
                        </td>
                        <?php if (!$modelAlatmesyuarat->isNewRecord): ?>
                            <?= Html::activeHiddenInput($modelAlatmesyuarat, "[{$index}]mesy_id"); ?>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>


        <?php DynamicFormWidget::end(); ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Hantar' : 'Hantar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>