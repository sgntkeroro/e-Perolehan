<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_dekan".
 *
 * @property integer $dekan_id
 * @property integer $user_id
 * @property string $dekan_nama
 * @property string $dekan_tel
 * @property integer $dekan_pekerjaNo
 *
 * @property User $user
 * @property TblPermohonan[] $tblPermohonans
 */
class TblDekan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_dekan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'dekan_nama', 'dekan_tel', 'dekan_pekerjaNo'], 'required'],
            [['user_id', 'dekan_pekerjaNo'], 'integer'],
            [['dekan_nama', 'dekan_tel'], 'string', 'max' => 200],
            [['user_id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dekan_id' => 'Dekan ID',
            'user_id' => 'User ID',
            'dekan_nama' => 'Nama Penuh',
            'dekan_tel' => 'Nombor Telefon',
            'dekan_pekerjaNo' => 'Nombor Pekerja',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPermohonans()
    {
        return $this->hasMany(TblPermohonan::className(), ['dekan_id' => 'dekan_id']);
    }
}
