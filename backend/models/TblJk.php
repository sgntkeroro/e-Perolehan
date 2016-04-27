<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_jk".
 *
 * @property integer $jk_id
 * @property string $jk_nama
 *
 * @property TblPeralatan[] $tblPeralatans
 */
class TblJk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_jk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jk_nama'], 'required'],
            [['jk_nama'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'jk_id' => 'Jk ID',
            'jk_nama' => 'Jk Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPeralatans()
    {
        return $this->hasMany(TblPeralatan::className(), ['jk_id' => 'jk_id']);
    }
}
