<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "min_kehadiran".
 *
 * @property integer $id
 * @property integer $min_id
 * @property string $hadir_nama
 * @property string $hadir_jawatan
 * @property string $hadir_peranan
 *
 * @property MinButiran $min
 */
class MinKehadiran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'min_kehadiran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hadir_nama', 'hadir_jawatan', 'hadir_peranan'], 'required'],
            [['min_id'], 'integer'],
            [['hadir_nama', 'hadir_jawatan', 'hadir_peranan'], 'string', 'max' => 200],
            [['min_id'], 'exist', 'skipOnError' => true, 'targetClass' => MinButiran::className(), 'targetAttribute' => ['min_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'min_id' => 'Min ID',
            'hadir_nama' => 'Nama',
            'hadir_jawatan' => 'Jawatan',
            'hadir_peranan' => 'Peranan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMin()
    {
        return $this->hasOne(MinButiran::className(), ['id' => 'min_id']);
    }
}
