<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_unitkc".
 *
 * @property integer $ukc_id
 * @property string $ukc_unit
 *
 * @property TblBhgnmod[] $tblBhgnmods
 */
class TblUnitkc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_unitkc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ukc_unit'], 'required'],
            [['ukc_unit'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ukc_id' => 'Ukc ID',
            'ukc_unit' => 'Ukc Unit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblBhgnmods()
    {
        return $this->hasMany(TblBhgnmod::className(), ['unitKC_id' => 'ukc_id']);
    }
}
