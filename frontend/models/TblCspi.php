<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_cspi".
 *
 * @property integer $cspi_id
 * @property integer $user_id
 * @property string $cspi_nama
 * @property string $cspi_tel
 * @property integer $cspi_pekerjaNo
 *
 * @property User $user
 */
class TblCspi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_cspi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'cspi_nama', 'cspi_tel', 'cspi_pekerjaNo'], 'required'],
            [['user_id', 'cspi_pekerjaNo'], 'integer'],
            [['cspi_nama', 'cspi_tel'], 'string', 'max' => 200],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cspi_id' => 'Cspi ID',
            'user_id' => 'Username',
            'cspi_nama' => 'Nama Penuh',
            'cspi_tel' => 'Nombor Telefon',
            'cspi_pekerjaNo' => 'Nombor Pekerja',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
