<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<?php //echo Html::img('@web/uploads/SuratPengesahan49') 
    Html::img(Yii::$app->urlManager->baseUrl.'/uploads/'.$surat->suratSah_nama)
?>