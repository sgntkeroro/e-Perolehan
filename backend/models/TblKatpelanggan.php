<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_katpelanggan".
 *
 * @property integer $pelanggan_id
 * @property string $pelanggan_nama
 *
 * @property TblPeralatan[] $tblPeralatans
 */
class TblKatpelanggan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_katpelanggan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pelanggan_nama'], 'required'],
            [['pelanggan_nama'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pelanggan_id' => 'Pelanggan ID',
            'pelanggan_nama' => 'Pelanggan Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPeralatans()
    {
        return $this->hasMany(TblPeralatan::className(), ['katPelanggan_id' => 'pelanggan_id']);
    }
}
