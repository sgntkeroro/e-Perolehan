<?php

use kartik\tabs\TabsX;

	    $items = [
        [
            'label'=>'<i class="glyphicon glyphicon-home"></i> Permohonan',
            'content'=>'about',
            'active'=>true
        ],
        [
            'label'=>'<i class="glyphicon glyphicon-user"></i> Profile',
            'content'=>'index'
        ],
        [
            'label'=>'<i class="glyphicon glyphicon-list-alt"></i> Dropdown',
            'items'=>[
                 [
                     'label'=>'Option 1',
                     'encode'=>false,
                     'content'=>'ggg',
                 ],
                 [
                     'label'=>'Option 2',
                     'encode'=>false,
                     'content'=>'ggg',
                 ],
            ],
        ],
        [
            'label'=>'<i class="glyphicon glyphicon-king"></i> Disabled',
            'headerOptions' => ['class'=>'disabled']
        ],
    ];
?>
<?= 
	TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_ABOVE,
    'bordered'=>true,
    'encodeLabels'=>false
]);
?>