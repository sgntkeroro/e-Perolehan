<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_jenisperuntukan".
 *
 * @property integer $jen_id
 * @property string $jen_nama
 */
class TblJenisperuntukan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_jenisperuntukan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jen_nama'], 'required'],
            [['jen_nama'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'jen_id' => 'Jen ID',
            'jen_nama' => 'Jen Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPeralatans()
    {
        return $this->hasMany(TblPeralatan::className(), ['jen_id' => 'jen_id']);
    }
}
