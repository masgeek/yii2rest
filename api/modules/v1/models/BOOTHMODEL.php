<?php
/**
 * Created by PhpStorm.
 * User: KRONOS
 * Date: 3/31/2017
 * Time: 14:12
 */

namespace app\api\modules\v1\models;


use app\api\models\EventBooth;

class BOOTHMODEL extends EventBooth
{
    public $reserved;

    public function fields()
    {
        return [
            'event_booth_id',
            'event_id',
            'event_booth_name',
            'booth_price',
            'booth_image',
            'reserved' => function ($model) { //return tru if booth is reserved and false if not
                return ($model->reservedBooths != null) ? true : false;
            },
        ];
    }
}