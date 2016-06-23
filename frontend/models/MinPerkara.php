<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "min_perkara".
 *
 * @property integer $id
 * @property integer $min_id
 * @property string $perkara_bil
 * @property string $perkara_tajuk
 * @property string $perkara_isi
 * @property string $perkara_maklumat
 *
 * @property MinButiran $min
 */
class MinPerkara extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'min_perkara';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['min_id'], 'integer'],
            [['perkara_tajuk', 'perkara_isi', 'perkara_maklumat'], 'string'],
            [['perkara_bil'], 'string', 'max' => 200],
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
            'min_id' => 'Butiran ID',
            'perkara_bil' => 'Bil.',
            'perkara_tajuk' => 'Perkara',
            'perkara_isi' => 'Isi',
            'perkara_maklumat' => 'Tindakan / Maklumat',
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
