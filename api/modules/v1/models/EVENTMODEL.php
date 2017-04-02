<?php
/**
 * Created by PhpStorm.
 * User: KRONOS
 * Date: 3/31/2017
 * Time: 13:58
 */

namespace app\api\modules\v1\models;


use app\api\models\Event;

class EVENTMODEL extends Event
{
    public function fields()
    {
        return [
            'event_id',
            'event_name',
            'event_location',
            'event_start_date',
            'event_end_date',
            'event_lat',
            'event_long',
            'event_booths' => function ($model) { //return all booths under this event
                return $model->eventBooths;
            },
        ];
    }
}