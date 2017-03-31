<?php
/**
 * Created by PhpStorm.
 * User: KRONOS
 * Date: 3/31/2017
 * Time: 13:41
 */

namespace app\api\modules\v1\models;


use app\api\models\User;
use yii\helpers\Url;
use yii\web\Link;
use yii\web\Linkable;

class USERMODEL extends User //implements Linkable
{
//* @property ReservedBooth[] $reservedBooths
//* @property UserCompany[] $userCompanies

    public function fields()
    {
        return [
            // field name is "name", its value is defined by a PHP callback
            'user_id',
            'full_names',
            'email',
            'company' => function ($model) {
                /* @var $this $model */
                return $model->userCompanies;
            },
            /*'booths' => function ($model) {
                return $model->reservedBooths;
            },*/
        ];
    }

    //add option to return linked data
    public function extraFields()
    {
        return ['userCompanies'];
        //return ['userCompanies'];
    }

    /*
        public function getLinks()
        {
            return [
                Link::REL_SELF => Url::to(['user/view', 'id' => $this->user_id], true),
                'edit' => Url::to(['users', 'id' => $this->user_id], true),
                'profile' => Url::to(['user/profile/view', 'id' => $this->user_id], true),
                'index' => Url::to(['users'], true),
            ];
        }
    */
}