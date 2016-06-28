<?php

namespace frontend\models;

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
 * @property TblMesyuaratperalatan[] $tblMesyuaratperalatans
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
            [['mesyPerm_id', 'permohonan_id', 'statMesyua_id'], 'integer'],
            [['mesyPerm_tarikh'], 'safe'],
            [['mesyPerm_catitan'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mesyPerm_id' => 'Mesyuarat Permohonan No.',
            'permohonan_id' => 'Permohonan No.',
            'statMesyua_id' => 'Status Mesyuarat',
            'mesyPerm_tarikh' => 'Tarikh',
            'mesyPerm_catitan' => 'Catitan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblMesyuaratperalatans()
    {
        return $this->hasMany(TblMesyuaratperalatan::className(), ['mesyPerm_id' => 'mesyPerm_id']);
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermohonandua()
    {
        return $this->hasOne(Permohonan::className(), ['permohonan_id' => 'permohonan_id']);
    }
}
