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
	                    'format' => 'yyyy-mm-dd',
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
	            'model' => $modelsHadir[0],
	            'formId' => 'dynamic-form',
	            'formFields' => [
	                'hadir_nama',
	                'hadir_jawatan',
	                'hadir_peranan',
	            ],
	        ]); ?>

	        <table class = "container-items table table-hover">
	        	<thead style = "background-color:yellow;">
	        		<th class = "col-md-1">BIL</th>
	        		<th class = "col-md-9">NAMA & JAWATAN</th>
	        		<th class = "col-md-2">PERANAN</th>
	        	</thead>
	        	<?php foreach ($modelsHadir as $index => $modelHadir): ?>
	        	<tbody class = "house-item">
	        		<tr>
	        			<td class = "col-md-1">
        					<button type="button" class="add-house btn btn-success btn-xs"><span class="glyphicon glyphicon-plus"></span></button>
                			<button type="button" class="remove-house btn btn-danger btn-xs"><span class="glyphicon glyphicon-minus"></span></button>
        				</td>
        				<td class = "col-md-9">
        					<?= $form->field($modelHadir, "[{$index}]hadir_nama")->label(false)->textInput(['maxlength' => true]) ?>
        					<?= $form->field($modelHadir, "[{$index}]hadir_jawatan")->label(false)->textInput(['maxlength' => true]) ?>
        				</td>
        				<td class = "col-md-2">
        					<?= $form->field($modelHadir, "[{$index}]hadir_peranan")->label(false)->textInput(['maxlength' => true]) ?>
        				</td>
	        		</tr>
	        	</tbody>
	        	<?php endforeach; ?>
	        </table>
	        <?php DynamicFormWidget::end(); ?>
	    </div>
	</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
