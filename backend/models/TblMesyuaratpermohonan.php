<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_mesyuaratpermohonan".
 *
 * @property integer $mesyPerm_id
 * @property integer $permohonan_id
 * @property integer $statMesyua_id
 * @property string $mesyPerm_tarikh
 * @property string $mesyPerm_catitan
 *
 * @property TblStatmesyua $statMesyua
 * @property TblPermohonan $permohonan
 */
class TblMesyuaratpermohonan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_mesyuaratpermohonan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['permohonan_id', 'statMesyua_id', 'mesyPerm_tarikh', 'mesyPerm_catitan'], 'required'],
            [['permohonan_id', 'statMesyua_id'], 'integer'],
            [['mesyPerm_tarikh'], 'safe'],
            [['mesyPerm_catitan'], 'string', 'max' => 200],
            [['statMesyua_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblStatmesyua::className(), 'targetAttribute' => ['statMesyua_id' => 'statMesyua_id']],
            [['permohonan_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblPermohonan::className(), 'targetAttribute' => ['permohonan_id' => 'permohonan_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mesyPerm_id' => 'Mesy Perm ID',
            'permohonan_id' => 'Permohonan ID',
            'statMesyua_id' => 'Stat Mesyua ID',
            'mesyPerm_tarikh' => 'Mesy Perm Tarikh',
            'mesyPerm_catitan' => 'Mesy Perm Catitan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatMesyua()
    {
        return $this->hasOne(TblStatmesyua::className(), ['statMesyua_id' => 'statMesyua_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermohonan()
    {
        return $this->hasOne(TblPermohonan::className(), ['permohonan_id' => 'permohonan_id']);
    }
}
