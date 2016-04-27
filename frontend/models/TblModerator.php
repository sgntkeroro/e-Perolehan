<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_moderator".
 *
 * @property integer $mod_id
 * @property integer $user_id
 * @property string $mod_nama
 * @property string $mod_tel
 * @property integer $mod_pekerjaNo
 * @property integer $bm_id
 *
 * @property TblBhgnmod $bm
 * @property User $user
 */
class TblModerator extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_moderator';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'mod_nama', 'mod_tel', 'mod_pekerjaNo', 'bm_id'], 'required'],
            [['user_id', 'mod_pekerjaNo', 'bm_id'], 'integer'],
            [['mod_nama', 'mod_tel'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mod_id' => 'Mod ID',
            'user_id' => 'User ID',
            'mod_nama' => 'Mod Nama',
            'mod_tel' => 'Mod Tel',
            'mod_pekerjaNo' => 'Mod Pekerja No',
            'bm_id' => 'Bm ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBm()
    {
        return $this->hasOne(TblBhgnmod::className(), ['bm_id' => 'bm_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
