<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\date\DatePicker;
use kartik\time\TimePicker;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model frontend\models\MinButiran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="min-butiran-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <div class="panel panel-primary">
	    <div class="panel-heading"><b>Butiran Mesyuarat</b></div>
	    <div class="panel-body">
	        <div class="col-sm-3 ">
	            <?= $form->field($model, 'minit_bil')->textInput(['maxlength' => true]) ?>
	        </div>

	        <div class="col-sm-4 ">
	            <?= $form->field($model, 'minit_tarikh')->widget(DatePicker::classname(), [
	                'options' => ['placeholder' => 'pilih tarikh mesyuarat'],
	                'pluginOptions' => [
	                    'format' => 'dd-mm-yyyy',
	                    'endDate' => '+0d',
	                    'autoclose'=>true
	                ]
	            ]); ?>

	            <?= $form->field($model, 'minit_masa')->widget(TimePicker::classname(), [
	                'pluginOptions' => [
	                    'showMeridian'=>false
	                ]
	            ]); ?>
	        </div>

	        <div class="col-sm-5">
	            <?= $form->field($model, 'minit_tempat')->textarea(['rows' => 4]) ?>
	        </div>
	    </div>
	</div>

	<div class="panel panel-primary">
	    <div class="panel-heading"><b>Butiran Mesyuarat</b></div>
	    <div class="panel-body">
	        <?php DynamicFormWidget::begin([
	            'widgetContainer' => 'dynamicform_wrapper',
	            'widgetBody' => '.container-items',
	            'widgetItem' => '.house-item',
	            'min' => 1,
	            'insertButton' => '.add-house',
	            'deleteButton' => '.remove-house',
	            'model' => $modelsPerkara[0],
	            'formId' => 'dynamic-form',
	            'formFields' => [
	                'perkara_bil',
	                'perkara_tajuk',
	                'perkara_isi',
	                'perkara_maklumat',
	            ],
	        ]); ?>

	        <table class = "container-items table table-hover table-bordered">
	        	<thead style = "background-color:yellow;">
	        		<th class = "col-md-1">BIL</th>
	        		<th class = "col-md-9">PERKARA</th>
	        		<th class = "col-md-2">TINDAKAN / MAKLUMAT</th>
	        	</thead>
	        	<?php foreach ($modelsPerkara as $index => $modelPerkara): ?>
	        	<tbody class = "house-item">
	        		<tr>
        				<td class = "col-md-1">
        					<?= $form->field($modelPerkara, "[{$index}]perkara_bil")->label(false)->textInput(['maxlength' => true]) ?>
        				</td>
        				<td class = "col-md-9">
        					<?= $form->field($modelPerkara, "[{$index}]perkara_tajuk")->label(false)->textInput(['maxlength' => true]) ?>
        				</td>
        				<td class = "col-md-2">
        				</td>
	        		</tr>
	        		<tr>
        				<td class = "col-md-1">
        					<button type="button" class="add-house btn btn-success btn-xs"><span class="glyphicon glyphicon-plus"></span></button>
                			<button type="button" class="remove-house btn btn-danger btn-xs"><span class="glyphicon glyphicon-minus"></span></button>
        				</td>
        				<td class = "col-md-9">
        					<?= $form->field($modelPerkara, "[{$index}]perkara_isi")->label(false)->textarea(['rows' => 7]) ?>
        				</td>
        				<td class = "col-md-2">
        					<?= $form->field($modelPerkara, "[{$index}]perkara_maklumat")->label(false)->textarea(['rows' => 7]) ?>
        				</td>
	        		</tr>
	        	</tbody>
	        	<?php endforeach; ?>
	        </table>
	        <?php DynamicFormWidget::end(); ?>
	        <div class="col-sm-13">
	            <?= $form->field($model, 'minit_notakaki')->textarea(['rows' => 4]) ?>
	        </div>
	    </div>
	</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
