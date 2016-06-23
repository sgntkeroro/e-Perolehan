<?php

namespace frontend\modules\mesyuarat\models;

use Yii;

/**
 * This is the model class for table "tbl_statsah".
 *
 * @property integer $statSah_id
 * @property string $statSah_nama
 */
class Statsah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_statsah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['statSah_nama'], 'required'],
            [['statSah_nama'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'statSah_id' => 'Stat Sah ID',
            'statSah_nama' => 'Stat Sah Nama',
        ];
    }
}
