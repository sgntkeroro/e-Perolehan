<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_sysop".
 *
 * @property integer $sys_id
 * @property integer $user_id
 * @property string $sys_nama
 * @property string $sys_tel
 * @property integer $sys_pekerjaNo
 *
 * @property User $user
 */
class TblSysop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_sysop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'sys_nama', 'sys_tel', 'sys_pekerjaNo'], 'required'],
            [['user_id', 'sys_pekerjaNo'], 'integer'],
            [['sys_nama', 'sys_tel'], 'string', 'max' => 200],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sys_id' => 'Sys ID',
            'user_id' => 'User ID',
            'sys_nama' => 'Sys Nama',
            'sys_tel' => 'Sys Tel',
            'sys_pekerjaNo' => 'Sys Pekerja No',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
