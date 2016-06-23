<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property integer $id
 * @property string $person_name
 *
 * @property House[] $houses
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['person_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'person_name' => 'Person Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHouses()
    {
        return $this->hasMany(House::className(), ['person_id' => 'id']);
    }
}
