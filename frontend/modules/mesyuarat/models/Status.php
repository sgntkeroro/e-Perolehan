<?php

namespace frontend\modules\mesyuarat\models;

use Yii;

/**
 * This is the model class for table "tbl_status".
 *
 * @property integer $status_id
 * @property string $status_status
 *
 * @property TblPermohonan[] $tblPermohonans
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_status'], 'required'],
            [['status_status'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'status_id' => 'Status ID',
            'status_status' => 'Status Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPermohonans()
    {
        return $this->hasMany(TblPermohonan::className(), ['status_id' => 'status_id']);
    }
}
