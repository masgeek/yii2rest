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
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_names', 'email'], 'required'],
            [['full_names', 'email'], 'string', 'max' => 30],
            [['email'], 'unique'],
        ];
    }

    /**
     * Define fields and objects to be returned in the API response
     * @return array
     */
    public function fields()
    {
        return [
            // field name is "name", its value is defined by a PHP callback
            'user_id',
            'full_names',
            'email',
            'company' => function ($model) {
                /* @var $this $model */
                return $model->companies;
            },
        ];
    }

    /**
     * Allows the definition of extra fields
     * /users/1?expand=usercCmpanies
     * @return array
     */
    public function extraFields()
    {
        return ['userCompanies'];
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