<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_statmesyua".
 *
 * @property integer $statMesyua_id
 * @property string $statMesyua_status
 *
 * @property TblMesyuaratpermohonan[] $tblMesyuaratpermohonans
 */
class TblStatmesyua extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_statmesyua';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['statMesyua_status'], 'required'],
            [['statMesyua_status'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'statMesyua_id' => 'Stat Mesyua ID',
            'statMesyua_status' => 'Stat Mesyua Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblMesyuaratpermohonans()
    {
        return $this->hasMany(TblMesyuaratpermohonan::className(), ['statMesyua_id' => 'statMesyua_id']);
    }
}
