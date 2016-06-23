<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "min_butiran".
 *
 * @property integer $id
 * @property string $minit_bil
 * @property string $minit_tarikh
 * @property string $minit_masa
 * @property string $minit_tempat
 * @property string $minit_notakaki
 *
 * @property MinKehadiran[] $minKehadirans
 * @property MinPerkara[] $minPerkaras
 */
class MinButiran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'min_butiran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['minit_bil', 'minit_tarikh', 'minit_masa', 'minit_tempat', 'minit_notakaki'], 'required'],
            [['minit_tempat', 'minit_notakaki'], 'string'],
            [['minit_bil', 'minit_tarikh', 'minit_masa'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'minit_bil' => 'Bil',
            'minit_tarikh' => 'Tarikh',
            'minit_masa' => 'Masa',
            'minit_tempat' => 'Tempat',
            'minit_notakaki' => 'Penutup',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMinKehadirans()
    {
        return $this->hasMany(MinKehadiran::className(), ['min_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMinPerkaras()
    {
        return $this->hasMany(MinPerkara::className(), ['min_id' => 'id']);
    }
}
