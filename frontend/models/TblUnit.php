<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_unit".
 *
 * @property integer $unit_id
 * @property string $unit_nama
 * @property integer $bahagian_id
 *
 * @property TblBhgnmod[] $tblBhgnmods
 * @property TblBahagian $bahagian
 */
class TblUnit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_unit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['unit_nama', 'bahagian_id'], 'required'],
            [['bahagian_id'], 'integer'],
            [['unit_nama'], 'string', 'max' => 200],
            [['bahagian_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblBahagian::className(), 'targetAttribute' => ['bahagian_id' => 'bahagian_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'unit_id' => 'Unit ID',
            'unit_nama' => 'Unit Nama',
            'bahagian_id' => 'Bahagian ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblBhgnmods()
    {
        return $this->hasMany(TblBhgnmod::className(), ['unit_id' => 'unit_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBahagian()
    {
        return $this->hasOne(TblBahagian::className(), ['bahagian_id' => 'bahagian_id']);
    }
}
