<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_bhgnmod".
 *
 * @property integer $bm_id
 * @property integer $unit_id
 * @property integer $bhgnKC_id
 *
 * @property TblUnitkc $bhgnKC
 * @property TblUnit $unit
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
            [['unit_id', 'bhgnKC_id'], 'required'],
            [['unit_id', 'bhgnKC_id'], 'integer'],
            [['bhgnKC_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblUnitkc::className(), 'targetAttribute' => ['bhgnKC_id' => 'ukc_id']],
            [['unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblUnit::className(), 'targetAttribute' => ['unit_id' => 'unit_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bm_id' => 'Bm ID',
            'unit_id' => 'Unit ID',
            'bhgnKC_id' => 'Bhgn Kc ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBhgnKC()
    {
        return $this->hasOne(TblUnitkc::className(), ['ukc_id' => 'bhgnKC_id']);
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
    public function getTblModerators()
    {
        return $this->hasMany(TblModerator::className(), ['bm_id' => 'bm_id']);
    }
}
