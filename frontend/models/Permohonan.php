<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_permohonan".
 *
 * @property integer $permohonan_id
 * @property integer $user_id
 * @property integer $kat_id
 * @property integer $sok_id
 * @property string $permohonan_tarikh
 * @property string $permohonan_pusatKos
 * @property integer $statMohon_id
 * @property integer $status_id
 *
 * @property User $user
 * @property TblStatmohon $statMohon
 * @property TblStatus $status
 * @property TblKategori $kat
 * @property TblSokongan $sok
 */
class Permohonan extends \yii\db\ActiveRecord
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
            [['user_id', 'kat_id', 'sok_id', 'statMohon_id', 'status_id'], 'integer'],
            [['permohonan_tarikh'], 'safe'],
            [['permohonan_komenpnc'], 'string'],
            [['permohonan_pusatKos'], 'string', 'max' => 200],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['statMohon_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStatmohon::className(), 'targetAttribute' => ['statMohon_id' => 'statMohon_id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStatus::className(), 'targetAttribute' => ['status_id' => 'status_id']],
            [['kat_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblKategori::className(), 'targetAttribute' => ['kat_id' => 'kat_id']],
            [['sok_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblSokongan::className(), 'targetAttribute' => ['sok_id' => 'sok_id']],
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
            'kat_id' => 'Kategori Permohonan',
            'status_id' => 'Status',
            'sok_id' => 'Status Sokongan',
            'permohonan_komenpnc' => 'Komen',
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
    public function getKategori()
    {
        return $this->hasOne(TblKategori::className(), ['kat_id' => 'kat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSokongan()
    {
        return $this->hasOne(TblSokongan::className(), ['sok_id' => 'sok_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblSuratpengesahans()
    {
        return $this->hasMany(TblSuratpengesahan::className(), ['permohonan_id' => 'permohonan_id']);
    }
}
