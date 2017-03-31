<?php

namespace app\api\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $user_id
 * @property string $full_names Full names
 * @property string $email Email address
 *
 * @property Company[] $companies
 * @property ReservedBooth[] $reservedBooths
 */
class User extends \yii\db\ActiveRecord
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
            [['full_names', 'email'], 'required'],
            [['full_names', 'email'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'full_names' => 'Full Names',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Company::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservedBooths()
    {
        return $this->hasMany(ReservedBooth::className(), ['user_id' => 'user_id']);
    }
}
