<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_sokongan".
 *
 * @property integer $sok_id
 * @property string $sok_sokongan
 *
 * @property TblPermohonan[] $tblPermohonans
 */
class TblSokongan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_sokongan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sok_sokongan'], 'required'],
            [['sok_sokongan'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sok_id' => 'Sok ID',
            'sok_sokongan' => 'Sok Sokongan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPermohonans()
    {
        return $this->hasMany(TblPermohonan::className(), ['sok_id' => 'sok_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermohonandua()
    {
        return $this->hasMany(Permohonan::className(), ['sok_id' => 'sok_id']);
    }
}
