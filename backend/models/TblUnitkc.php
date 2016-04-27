<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_unitkc".
 *
 * @property integer $ukc_id
 * @property string $ukc_unit
 * @property integer $unit_id
 *
 * @property TblBhgnmod[] $tblBhgnmods
 * @property TblUnit $unit
 */
class TblUnitkc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_unitkc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ukc_unit', 'unit_id'], 'required'],
            [['unit_id'], 'integer'],
            [['ukc_unit'], 'string', 'max' => 200],
            [['unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblUnit::className(), 'targetAttribute' => ['unit_id' => 'unit_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ukc_id' => 'Ukc ID',
            'ukc_unit' => 'Ukc Unit',
            'unit_id' => 'Unit ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblBhgnmods()
    {
        return $this->hasMany(TblBhgnmod::className(), ['bhgnKC_id' => 'ukc_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(TblUnit::className(), ['unit_id' => 'unit_id']);
    }
}
