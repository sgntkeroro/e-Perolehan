<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_suratpengesahan".
 *
 * @property integer $suratSah_id
 * @property integer $permohonan_id
 * @property string $suratSah_path
 * @property string $suratSah_type
 * @property integer $suratSah_size
 * @property string $suratSah_nama
 * @property string $suratSah_tarikh
 * @property string $suratSah_deskripsi
 *
 * @property TblPermohonan $permohonan
 */
class TblSuratpengesahan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_suratpengesahan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['permohonan_id', 'suratSah_path', 'suratSah_nama', 'suratSah_tarikh'], 'required'],
            [['permohonan_id', 'suratSah_size'], 'integer'],
            [['suratSah_tarikh'], 'safe'],
            [['suratSah_path', 'suratSah_type', 'suratSah_nama', 'suratSah_deskripsi'], 'string', 'max' => 200],
            [['permohonan_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblPermohonan::className(), 'targetAttribute' => ['permohonan_id' => 'permohonan_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'suratSah_id' => 'Surat Sah ID',
            'permohonan_id' => 'Permohonan ID',
            'suratSah_path' => 'Surat Sah Path',
            'suratSah_type' => 'Surat Sah Type',
            'suratSah_size' => 'Surat Sah Size',
            'suratSah_nama' => 'Surat Sah Nama',
            'suratSah_tarikh' => 'Surat Sah Tarikh',
            'suratSah_deskripsi' => 'Surat Sah Deskripsi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermohonan()
    {
        return $this->hasOne(TblPermohonan::className(), ['permohonan_id' => 'permohonan_id']);
    }
}
