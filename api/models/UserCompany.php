<?php

namespace app\api\models;

use Yii;

/**
 * This is the model class for table "user_company".
 *
 * @property integer $company_id
 * @property integer $user_id
 * @property string $company_name
 * @property string $company_admin
 * @property string $email
 * @property string $address
 * @property string $logo_path
 *
 * @property Uploads[] $uploads
 * @property User $user
 */
class UserCompany extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'company_name', 'company_admin', 'email', 'address', 'logo_path'], 'required'],
            [['user_id'], 'integer'],
            [['address'], 'string'],
            [['company_name', 'company_admin', 'email'], 'string', 'max' => 30],
            [['logo_path'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'user_id' => 'User ID',
            'company_name' => 'Company Name',
            'company_admin' => 'Company Admin',
            'email' => 'Email',
            'address' => 'Address',
            'logo_path' => 'Logo Path',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUploads()
    {
        return $this->hasMany(Uploads::className(), ['company_id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }
}
