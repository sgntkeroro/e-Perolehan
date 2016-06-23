<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */

$this->title = 'Score';
?>
<div class="panel panel-primary" style="">
    <div class="panel-heading"><b><h4>Score Competency Table</h4></b></div>
    <div class="panel-body">
        <table class = "table table-bordered table-hover">
            <thead style ="background-color:pink">
                <th>Score</th>
                <th>Grade</th>
            </thead>
            <tbody>
                <tr>
                    <td>90 - 100</td>
                    <td>Highly Competent</td>
                </tr>
                <tr>
                    <td>70 - 89</td>
                    <td>Competent</td>
                </tr>
                <tr>
                    <td>50 - 69</td>
                    <td>Low Competent</td>
                </tr>
                <tr>
                    <td>Below 50</td>
                    <td>Fail*</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
