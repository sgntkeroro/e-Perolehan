<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_pengesahan".
 *
 * @property integer $sah_id
 * @property integer $permohonan_id
 * @property integer $statSah_id
 * @property string $sah_tarikh
 * @property string $sah_catitan
 *
 * @property TblStatsah $statSah
 * @property TblPermohonan $permohonan
 */
class TblPengesahan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_pengesahan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['permohonan_id', 'statSah_id', 'sah_tarikh', 'sah_catitan'], 'required'],
            [['permohonan_id', 'statSah_id'], 'integer'],
            [['sah_tarikh'], 'safe'],
            [['sah_catitan'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sah_id' => 'Sah ID',
            'permohonan_id' => 'Permohonan ID',
            'statSah_id' => 'Status Pengesahan',
            'sah_tarikh' => 'Tarikh',
            'sah_catitan' => 'Catitan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatSah()
    {
        return $this->hasOne(TblStatsah::className(), ['statSah_id' => 'statSah_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermohonan()
    {
        return $this->hasOne(TblPermohonan::className(), ['permohonan_id' => 'permohonan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermohonandua()
    {
        return $this->hasOne(Permohonan::className(), ['permohonan_id' => 'permohonan_id']);
    }
}
