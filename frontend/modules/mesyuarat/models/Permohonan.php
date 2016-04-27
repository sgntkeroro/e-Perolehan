<?php

namespace frontend\modules\mesyuarat\models;

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
 * @property User $user
 * @property TblStatmohon $statMohon
 * @property TblStatus $status
 * @property TblDekan $dekan
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
            [['user_id', 'permohonan_tarikh', 'permohonan_pusatKos', 'statMohon_id', 'dekan_id', 'status_id'], 'required'],
            [['user_id', 'statMohon_id', 'dekan_id', 'status_id'], 'integer'],
            [['permohonan_tarikh'], 'safe'],
            [['permohonan_pusatKos'], 'string', 'max' => 200],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['statMohon_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStatmohon::className(), 'targetAttribute' => ['statMohon_id' => 'statMohon_id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStatus::className(), 'targetAttribute' => ['status_id' => 'status_id']],
            [['dekan_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblDekan::className(), 'targetAttribute' => ['dekan_id' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'permohonan_id' => 'Permohonan ID',
            'user_id' => 'User ID',
            'permohonan_tarikh' => 'Permohonan Tarikh',
            'permohonan_pusatKos' => 'Permohonan Pusat Kos',
            'statMohon_id' => 'Stat Mohon ID',
            'dekan_id' => 'Dekan ID',
            'status_id' => 'Status ID',
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
    public function getStatMohon()
    {
        return $this->hasOne(TblStatmohon::className(), ['statMohon_id' => 'statMohon_id']);
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
    public function getDekan()
    {
        return $this->hasOne(TblDekan::className(), ['user_id' => 'dekan_id']);
    }
}
