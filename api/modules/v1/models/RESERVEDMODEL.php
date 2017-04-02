<?php
/**
 * Created by PhpStorm.
 * User: KRONOS
 * Date: 3/31/2017
 * Time: 14:21
 */

namespace app\api\modules\v1\models;


use app\api\models\ReservedBooth;
use yii\helpers\Url;
use yii\web\Link;
use yii\web\Linkable;

class RESERVEDMODEL extends ReservedBooth //implements Linkable
{
    public $reserved_by;
    public $booth_name;

    public function fields()
    {
        return [
            'reserved_booth_id',
            'event_booth_id',
            'booth_name' => function ($model) {
                return $model->eventBooth->event_booth_name;
            },
            'user_id',
            'reserved',
            'reserved_by' => function ($model) { //return tru if booth is reserved and false if not
                return $model->user;
            },
        ];
    }

/*
     public function getLinks()
     {
         return [
             Link::REL_SELF => Url::to(['user/view', 'id' => $this->reserved_booth_id], true),
             'edit' => Url::to(['users', 'id' => $this->reserved_booth_id], true),
             'profile' => Url::to(['user/profile/view', 'id' => $this->reserved_booth_id], true),
             'index' => Url::to(['users'], true),
         ];
     }
*/

}