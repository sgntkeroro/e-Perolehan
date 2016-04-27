<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_bukulog".
 *
 * @property integer $bukulog_id
 * @property string $bukulog_path
 * @property string $bukulog_type
 * @property integer $bukulog_size
 * @property string $bukulog_nama
 * @property integer $sort_order
 *
 * @property TblPeralatan[] $tblPeralatans
 */
class TblBukulog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_bukulog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bukulog_path', 'bukulog_type', 'bukulog_size', 'bukulog_nama', 'sort_order'], 'required'],
            [['bukulog_size', 'sort_order'], 'integer'],
            [['bukulog_path', 'bukulog_type', 'bukulog_nama'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bukulog_id' => 'Bukulog ID',
            'bukulog_path' => 'Bukulog Path',
            'bukulog_type' => 'Bukulog Type',
            'bukulog_size' => 'Bukulog Size',
            'bukulog_nama' => 'Bukulog Nama',
            'sort_order' => 'Sort Order',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPeralatans()
    {
        return $this->hasMany(TblPeralatan::className(), ['bukuLog_id' => 'bukulog_id']);
    }
}
