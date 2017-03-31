<?php
/**
 * Created by PhpStorm.
 * User: KRONOS
 * Date: 3/31/2017
 * Time: 14:30
 */

namespace app\api\modules\v1\models;


use app\api\models\Uploads;

class UPLOADSMODEL extends Uploads
{
    public function fields()
    {
        return [
            'upload_id',
            'company_id',
            'document_name',
            'document_path',
            'reserved_by' => function ($model) { //return tru if booth is reserved and false if not
                return $model->company;
            },
        ];
    }
}