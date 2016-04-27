<?php

namespace frontend\modules\mesyuarat\models;

use Yii;

/**
 * This is the model class for table "tbl_jk".
 *
 * @property integer $jk_id
 * @property string $jk_nama
 */
class Jk extends \yii\db\ActiveRecord
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
}
