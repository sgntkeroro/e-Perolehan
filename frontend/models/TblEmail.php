<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_email".
 *
 * @property integer $email_id
 * @property string $receiver_name
 * @property string $receiver_email
 * @property string $content
 * @property string $attachment
 * @property string $subject
 */
class TblEmail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_email';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['receiver_name', 'receiver_email', 'content', 'subject'], 'required'],
            [['content'], 'string'],
            [['receiver_name', 'receiver_email', 'attachment', 'subject'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email_id' => 'Email ID',
            'receiver_name' => 'Receiver Name',
            'receiver_email' => 'Receiver Email',
            'content' => 'Content',
            'attachment' => 'Attachment',
            'subject' => 'Subject',
        ];
    }
}
