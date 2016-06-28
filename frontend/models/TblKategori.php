<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_kategori".
 *
 * @property integer $kat_id
 * @property string $kat_kategori
 *
 * @property TblPermohonan[] $tblPermohonans
 */
class TblKategori extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_kategori';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kat_kategori'], 'required'],
            [['kat_kategori'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kat_id' => 'Kat ID',
            'kat_kategori' => 'Kat Kategori',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPermohonans()
    {
        return $this->hasMany(TblPermohonan::className(), ['kat_id' => 'kat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermohonandua()
    {
        return $this->hasMany(Permohonan::className(), ['kat_id' => 'kat_id']);
    }
}
