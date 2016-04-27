<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_permohonan".
 *
 * @property integer $permohonan_id
 * @property integer $user_id
 * @property string $permohonan_tarikh
 * @property string $permohonan_pusatKos
 * @property integer $statMohon_id
 * @property integer $dekan_id
 * @property integer $status_id
 *
 * @property TblMesyuaratpermohonan[] $tblMesyuaratpermohonans
 * @property TblPengesahan[] $tblPengesahans
 * @property TblPeralatan[] $tblPeralatans
 * @property TblStatus $status
 * @property User $user
 * @property TblStatmohon $statMohon
 * @property TblDekan $dekan
 * @property TblSuratpengesahan[] $tblSuratpengesahans
 */
class TblPermohonan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_permohonan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'permohonan_tarikh', 'statMohon_id', 'dekan_id', 'status_id'], 'required'],
            [['user_id', 'statMohon_id', 'dekan_id', 'status_id'], 'integer'],
            [['permohonan_tarikh'], 'safe'],
            [['permohonan_pusatKos'], 'string', 'max' => 200],
            // [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStatus::className(), 'targetAttribute' => ['status_id' => 'status_id']],
            // [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            // [['statMohon_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStatmohon::className(), 'targetAttribute' => ['statMohon_id' => 'statMohon_id']],
            // [['dekan_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblDekan::className(), 'targetAttribute' => ['dekan_id' => 'dekan_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'permohonan_id' => 'No. Permohonan',
            'user_id' => 'ID Pemohon',
            'permohonan_tarikh' => 'Tarikh',
            'permohonan_pusatKos' => 'Pusat Kos',
            'statMohon_id' => 'Status Permohonan',
            'dekan_id' => 'Dekan / PTJ',
            'status_id' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblMesyuaratpermohonans()
    {
        return $this->hasMany(TblMesyuaratpermohonan::className(), ['permohonan_id' => 'permohonan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPengesahans()
    {
        return $this->hasMany(TblPengesahan::className(), ['permohonan_id' => 'permohonan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPeralatans()
    {
        return $this->hasMany(TblPeralatan::className(), ['permohonan_id' => 'permohonan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(TblStatus::className(), ['status_id' => 'status_id']);
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
    public function getStatMohon()
    {
        return $this->hasOne(TblStatmohon::className(), ['statMohon_id' => 'statMohon_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDekan()
    {
        return $this->hasOne(TblDekan::className(), ['dekan_id' => 'dekan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblSuratpengesahans()
    {
        return $this->hasMany(TblSuratpengesahan::className(), ['permohonan_id' => 'permohonan_id']);
    }
}
