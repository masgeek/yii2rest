<?php

namespace app\api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "citizen".
 *
 * @property integer $user_id
 * @property string $country_code
 * @property string $user_name
 *
 * @property Country $countryCode
 */
class CITIZEN extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'citizen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_code'], 'required'],
            [['country_code'], 'string', 'max' => 2],
            [['user_name'], 'string', 'max' => 255],
            [['country_code'], 'exist', 'skipOnError' => true, 'targetClass' => COUNTRY::className(), 'targetAttribute' => ['country_code' => 'code']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'country_code' => 'Country Code',
            'user_name' => 'User Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountryCode()
    {
        return $this->hasOne(COUNTRY::className(), ['code' => 'country_code']);
    }
}