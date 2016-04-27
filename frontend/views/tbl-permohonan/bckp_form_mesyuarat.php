<?php

use yii\helpers\Html;
use wbraganca\dynamicform\DynamicFormWidget;
?>

<?php DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_inner',
    'widgetBody' => '.container-rooms',
    'widgetItem' => '.room-item',
    'min' => 1,
    'insertButton' => '.add-room',
    'deleteButton' => '.remove-room',
    'model' => $modelsMesyuarat[0],
    'formId' => 'dynamic-form',
    'formFields' => [
        'mesy_catitan'
    ],
]); ?>

    <div class="container-rooms input-group-sm">
    <?php foreach ($modelsMesyuarat as $indexM => $modelMesyuarat): ?>
        <div class="room-item">
                <?php
                    // necessary for update action.
                    if (! $modelMesyuarat->isNewRecord) {
                        echo Html::activeHiddenInput($modelMesyuarat, "[{$index}][{$indexM}]mesy_id");
                    }
                ?>
                <?= $form->field($modelMesyuarat, "[{$index}][{$indexM}]mesy_catitan")->label(false)->hiddenInput(['maxlength' => true]) ?>
        </div>
     <?php endforeach; ?>
    </div>
<?php DynamicFormWidget::end(); ?>