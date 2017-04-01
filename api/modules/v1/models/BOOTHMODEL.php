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
    public $event;
    public $reserved;
    public $reserved_by;
    public $company;

    public function fields()
    {
        return [
            'event_booth_id',
            'event_id',
            'event_booth_name',
            'booth_price',
            'booth_image',
            'description',
            'event' => function ($model) {
                $data = null;
                if ($model->reservedBooths != null) {
                    $data = EVENTMODEL::findOne(['event_id' => $model->event_id]);
                }
                return $data;
            },
            'reserved' => function ($model) { //return tru if booth is reserved and false if not
                return ($model->reservedBooths != null) ? true : false;
            },
            'company' => function ($model) { //return tru if booth is reserved and false if not
                $data = null;
                if ($model->reservedBooths != null) {
                    //query the details
                    //find details of the company the user is associated with
                    $data = COMPANYMODEL::findOne(['user_id' => $model->reservedBooths[0]->user_id]);
                }
                return $data;
            },
        ];
    }
}