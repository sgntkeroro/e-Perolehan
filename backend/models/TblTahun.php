<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_tahun".
 *
 * @property integer $tahun_id
 * @property integer $tahun_tahun
 *
 * @property TblPeralatan[] $tblPeralatans
 */
class TblTahun extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_tahun';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tahun_tahun'], 'required'],
            [['tahun_tahun'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tahun_id' => 'Tahun ID',
            'tahun_tahun' => 'Tahun Tahun',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPeralatans()
    {
        return $this->hasMany(TblPeralatan::className(), ['tahunSedia_id' => 'tahun_id']);
    }
}
