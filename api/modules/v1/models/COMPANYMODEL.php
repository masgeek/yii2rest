<?php
/**
 * Created by PhpStorm.
 * User: KRONOS
 * Date: 3/31/2017
 * Time: 14:26
 */

namespace app\api\modules\v1\models;


use app\api\models\Company;

class COMPANYMODEL extends Company
{
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