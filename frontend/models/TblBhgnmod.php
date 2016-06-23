<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_bhgnmod".
 *
 * @property integer $bm_id
 * @property integer $bahagian_id
 * @property integer $unit_id
 * @property integer $unitKC_id
 *
 * @property TblBahagian $bahagian
 * @property TblUnit $unit
 * @property TblUnitkc $unitKC
 * @property TblModerator[] $tblModerators
 */
class TblBhgnmod extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_bhgnmod';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bahagian_id', 'unit_id'], 'required'],
            [['bahagian_id', 'unit_id'], 'integer'],
            [['unit_kampuscawangan'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bm_id' => 'Bm ID',
            'bahagian_id' => 'Bahagian ID',
            'unit_id' => 'Unit ID',
            'unitKC_id' => 'Unit Kc ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBahagian()
    {
        return $this->hasOne(TblBahagian::className(), ['bahagian_id' => 'bahagian_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(TblUnit::className(), ['unit_id' => 'unit_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnitKC()
    {
        return $this->hasOne(TblUnitkc::className(), ['ukc_id' => 'unitKC_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblModerators()
    {
        return $this->hasMany(TblModerator::className(), ['bm_id' => 'bm_id']);
    }
}
