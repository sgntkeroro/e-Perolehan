<?php

namespace frontend\modules\mesyuarat\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $role_id
 *
 * @property TblCspi[] $tblCspis
 * @property TblDekan $tblDekan
 * @property TblModerator[] $tblModerators
 * @property TblPermohonan[] $tblPermohonans
 * @property TblSysop[] $tblSysops
 */
class Usermesyuarat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at', 'role_id'], 'required'],
            [['status', 'created_at', 'updated_at', 'role_id'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'role_id' => 'Role ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblCspis()
    {
        return $this->hasMany(TblCspi::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblDekan()
    {
        return $this->hasOne(TblDekan::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblModerators()
    {
        return $this->hasMany(TblModerator::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPermohonans()
    {
        return $this->hasMany(TblPermohonan::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblSysops()
    {
        return $this->hasMany(TblSysop::className(), ['user_id' => 'id']);
    }
}
