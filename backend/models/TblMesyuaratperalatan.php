<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_mesyuaratperalatan".
 *
 * @property integer $mesy_id
 * @property integer $alat_id
 * @property integer $mesy_kuantiti
 * @property string $mesy_jumlahHarga
 * @property string $mesy_catitan
 *
 * @property TblPeralatan $alat
 */
class TblMesyuaratperalatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_mesyuaratperalatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alat_id', 'mesy_kuantiti', 'mesy_jumlahHarga', 'mesy_catitan'], 'required'],
            [['alat_id', 'mesy_kuantiti'], 'integer'],
            [['mesy_jumlahHarga'], 'number'],
            [['mesy_catitan'], 'string', 'max' => 200],
            [['alat_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblPeralatan::className(), 'targetAttribute' => ['alat_id' => 'alat_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mesy_id' => 'Mesy ID',
            'alat_id' => 'Alat ID',
            'mesy_kuantiti' => 'Mesy Kuantiti',
            'mesy_jumlahHarga' => 'Mesy Jumlah Harga',
            'mesy_catitan' => 'Mesy Catitan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlat()
    {
        return $this->hasOne(TblPeralatan::className(), ['alat_id' => 'alat_id']);
    }
}
