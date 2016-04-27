<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_statmohon".
 *
 * @property integer $statMohon_id
 * @property string $statMohon_status
 *
 * @property TblPermohonan[] $tblPermohonans
 */
class TblStatmohon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_statmohon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['statMohon_status'], 'required'],
            [['statMohon_status'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'statMohon_id' => 'Stat Mohon ID',
            'statMohon_status' => 'Stat Mohon Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPermohonans()
    {
        return $this->hasMany(TblPermohonan::className(), ['statMohon_id' => 'statMohon_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblDekansahs()
    {
        return $this->hasMany(TblDekansah::className(), ['statMohon_id' => 'statMohon_id']);
    }
}
