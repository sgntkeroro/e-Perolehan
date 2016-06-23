<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\db\Query;
use yii\db\Command;

    $query = new Query;
    $query ->select([
    'user.username as username',
    'user.email as email',
    'tbl_unit.unit_nama as unit_nama',

    'tbl_role.role_name as role_name'
    ])
    ->from('user, tbl_role, tbl_unit, tbl_bhgnmod, tbl_moderator')

    ->where('user.id = "'.Yii::$app->user->identity->id.'"')
    ->andWhere('tbl_bhgnmod.bm_id = tbl_moderator.bm_id')
    ->andWhere('tbl_moderator.user_id = user.id')
    ->andWhere('tbl_bhgnmod.unit_id = tbl_unit.unit_id')
    ->andWhere('user.role_id = tbl_role.role_id'); 

    $command=$query->createCommand();
    $data=$command->queryAll();

/* @var $this yii\web\View */
/* @var $model frontend\models\TblModerator */

$this->title = 'Profil';
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
    table
        {
            border-left: 0px solid;
            border-top: 0px solid;
             
            border-spacing:0;
            border-collapse: collapse; 

            counter-reset: rowNumber;             
        }

    table td 
        {
            border-right: 0px solid;
            border-bottom: 0px solid;
            padding: 2mm;
        }
        
</style>

<div class="panel panel-primary">
    <div class="panel-heading">&nbsp;&nbsp;P R O F I L &nbsp;&nbsp;   P E N G G U N A</div>
    <div class="panel-body">
        <?= Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', ['update', 'id' => $model->mod_id], ['class' => 'btn btn-success']) ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Nama Penuh</th>
                    <th>Nombor Pekerja</th>
                    <th>Email</th>
                    <th>Nombor Telefon</th>
                    <th>Role</th>
                    <th>Bahagian / Cawangan</th>
                </tr>
            </thead>
            <tr>
                <td>
                    <?php foreach ($data as $username): ?>
                        <?= $username['username'] ?>
                    <?php endforeach; ?>
                </td>
                <td>
                    <?= $model->mod_nama ?>
                </td>
                <td>
                    <?= $model->mod_pekerjaNo ?>
                </td>
                <td>
                    <?php foreach ($data as $email): ?>
                        <?= $email['email'] ?>
                    <?php endforeach; ?>
                </td>
                <td>
                    <?= $model->mod_tel ?>
                </td>
                <td>
                    <?php foreach ($data as $role): ?>
                    <?= $role['role_name'] ?>
                <?php endforeach; ?>
                </td>
                <td>
                    <?php foreach ($data as $unit_nama): ?>
                        <?= $unit_nama['unit_nama'] ?>
                    <?php endforeach; ?>
                </td>
            </tr>
        </table>
    </div>
</div>
