<?php

namespace frontend\modules\mesyuarat\models;

use Yii;

/**
 * This is the model class for table "tbl_bahagian".
 *
 * @property integer $bahagian_id
 * @property string $bahagian_nama
 *
 * @property TblBhgnmod[] $tblBhgnmods
 * @property TblUnit[] $tblUnits
 */
class Bahagian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_bahagian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bahagian_nama'], 'required'],
            [['bahagian_nama'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bahagian_id' => 'Bahagian ID',
            'bahagian_nama' => 'Bahagian Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblBhgnmods()
    {
        return $this->hasMany(TblBhgnmod::className(), ['bahagian_id' => 'bahagian_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblUnits()
    {
        return $this->hasMany(TblUnit::className(), ['bahagian_id' => 'bahagian_id']);
    }
}
