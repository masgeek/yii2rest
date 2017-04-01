<?php
/**
 * Created by PhpStorm.
 * User: KRONOS
 * Date: 3/31/2017
 * Time: 14:26
 */

namespace app\api\modules\v1\models;


use app\api\models\Company;
use app\api\models\User;

class COMPANYMODEL extends Company
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'company_name', 'company_admin', 'email', 'phone', 'address', 'logo_path'], 'required'],
            [['user_id'], 'integer'],
            [['address'], 'string'],
            [['company_name'], 'string', 'max' => 50],
            [['company_admin', 'email'], 'string', 'max' => 30],
            [['phone'], 'string', 'max' => 25],
            [['logo_path'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    public function fields()
    {
        return [
            'company_id',
            'user_id',
            'company_name',
            'company_admin',
            'email',
            'phone',
            'address',
            'logo_path',
            'uploads' => function ($model) { //return tru if booth is reserved and false if not
                return $model->uploads;
            },
        ];
    }
}